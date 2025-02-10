<?php

namespace App\Services;

use app\Enums\EReservationStatus;
use App\Handlers\BookStockHandler;
use App\Handlers\ReservationHandler;
use App\Models\BookStock;
use App\Repositories\BookStockRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;

class ReservationService extends BasicService
{
    /**
     * @throws Exception
     */
    public function reserveBook(int $userId, BookStock $bookStock): bool
    {
        $bookStockHandler = new BookStockHandler();
        $isReserveBook = $bookStockHandler->reserveBook(
            bookStockId: $bookStock->id,
            newReservedCopies: $bookStock->reserved_copies + 1,
            lockVersion: $bookStock->lock_version,
        );

        if (!$isReserveBook) {
            // No available book, concurrent !
            return false;
        }

        $userRepository = new UserRepository();
        $countDay = $userRepository->getCountDueDateReserve($userId);

        $reservationHandler = new ReservationHandler();
        $reservationHandler->userReserveBook(
            userId: $userId,
            bookStockId: $bookStock->id,
            status: EReservationStatus::Active,
            dueDate: Carbon::now()->addDays($countDay)
        );

        return true;
    }
}
