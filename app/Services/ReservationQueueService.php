<?php

namespace App\Services;

use App\Enums\EReservationQueueStatus;
use App\Exceptions\ErrorJsonException;
use App\Handlers\ReservationQueueHandler;
use App\DTOs\ReservationQueueDTO;
use App\Jobs\HandleNextReservationQueueJob;
use App\Models\BookStock;
use App\Repositories\ReservationQueueRepository;
use App\Repositories\UserRepository;
use function PHPUnit\Framework\isNull;

class ReservationQueueService extends BasicService
{
    protected ReservationQueueHandler $reservationQueueHandler;
    protected ReservationQueueRepository $reservationQueueRepository;

    public function __construct()
    {
        $this->reservationQueueHandler = new ReservationQueueHandler();
        $this->reservationQueueRepository = new ReservationQueueRepository();
    }

    /**
     * @throws ErrorJsonException
     */
    public function reserveBookQueue(int $userId, int $bookStockId): bool
    {
        $reservationQueueRepository = new ReservationQueueRepository();
        $isWaitingStatusInReservationQueue = $reservationQueueRepository->isWaitingStatusByUserId($userId);

        if ($isWaitingStatusInReservationQueue) {
            throw new ErrorJsonException('This user has a wait reservation queue');
        }

        $userRepository = new UserRepository();
        $priority = $userRepository->getPriorityReservationBook($userId);

        $this->reservationQueueHandler->userReserveBookQueue(
            userId: $userId,
            bookStockId: $bookStockId,
            status: EReservationQueueStatus::Waiting,
            priority: $priority
        );

        return true;
    }

    public function handleNextReservationQueue(int $bookStockId): void
    {
        $nextReservation = $this->reservationQueueRepository->getHighestPriorityReservation($bookStockId);

        if (!is_null($nextReservation)) {
            HandleNextReservationQueueJob::dispatch($nextReservation);
        }
    }

    public function completeReservationQueue(int $reservationQueueId): void
    {
        $this->reservationQueueHandler->updateStatusReservationQueue(
            reservationQueueId: $reservationQueueId,
            status: EReservationQueueStatus::Completed
        );
    }

    public function cancelReservationQueue(int $reservationQueueId): void
    {
        $this->reservationQueueHandler->updateStatusReservationQueue(
            reservationQueueId: $reservationQueueId,
            status: EReservationQueueStatus::Canceled
        );
    }
}
