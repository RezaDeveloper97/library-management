<?php

namespace App\Services;

use App\Enums\EReservationQueueStatus;
use App\Exceptions\ErrorJsonException;
use App\Handlers\ReservationQueueHandler;
use App\DTOs\ReservationQueueDTO;
use App\Models\BookStock;
use App\Repositories\ReservationQueueRepository;
use App\Repositories\UserRepository;

class ReservationQueueService extends BasicService
{
    protected $reservationQueueHandler;

    public function __construct()
    {
        $this->reservationQueueHandler = new ReservationQueueHandler();
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
}
