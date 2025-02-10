<?php

namespace App\Services;

use app\Enums\EReservationStatus;
use App\Exceptions\ErrorJsonException;
use App\Handlers\BookStockHandler;
use App\Handlers\ReservationHandler;
use App\Models\BookStock;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class ReservationService extends BasicService
{
    protected ReservationHandler $reservationHandler;

    public function __construct()
    {
        $this->reservationHandler = new ReservationHandler();
    }

    /**
     * @throws Exception
     */
    public function reserveBook(int $userId, BookStock $bookStock): bool
    {
        return DB::transaction(function () use ($userId, $bookStock) {
            if ($bookStock->reserved_copies >= $bookStock->total_copies) {
                $this->_addToReserveBookQueue($userId, $bookStock->id);
                return false;
            }

            $bookStockHandler = new BookStockHandler();
            $isReserveBook = $bookStockHandler->updateReservedCopiesBookStock(
                bookStockId: $bookStock->id,
                newReservedCopies: $bookStock->reserved_copies + 1,
                lockVersion: $bookStock->lock_version,
            );

            if (!$isReserveBook) {
                // No available book, concurrent !
                $this->_addToReserveBookQueue($userId, $bookStock->id);
                return false;
            }

            $userRepository = new UserRepository();
            $countDay = $userRepository->getCountDueDateReserve($userId);

            $this->reservationHandler->userReserveBook(
                userId: $userId,
                bookStockId: $bookStock->id,
                dueDate: Carbon::now()->addDays($countDay)
            );

            return true;
        });
    }

    /**
     * @throws Exception
     */
    public function returnReserveBook(int $reservationId, BookStock $bookStock): bool
    {
        return DB::transaction(function () use ($reservationId, $bookStock) {
            $bookStockHandler = new BookStockHandler();
            $isReturnReserveBook = $bookStockHandler->updateReservedCopiesBookStock(
                bookStockId: $bookStock->id,
                newReservedCopies: $bookStock->reserved_copies - 1,
                lockVersion: $bookStock->lock_version,
            );

            if (!$isReturnReserveBook) {
                // concurrent !
                return false;
            }

            $this->reservationHandler->userReturnReserveBook(
                reservationId: $reservationId,
                returnedAt: Carbon::now()
            );

            return true;
        });
    }

    /**
     * @throws ErrorJsonException
     */
    private function _addToReserveBookQueue(int $userId, int $bookStockId): void
    {
        $reservationQueueService = new ReservationQueueService();
        $reservationQueueService->reserveBookQueue(
            userId: $userId,
            bookStockId: $bookStockId,
        );
    }
}
