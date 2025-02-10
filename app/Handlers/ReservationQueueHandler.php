<?php

namespace App\Handlers;

use App\Enums\EReservationQueueStatus;
use App\Models\ReservationQueue;
use App\DTOs\ReservationQueueDTO;
use Carbon\Carbon;

class ReservationQueueHandler extends BasicHandler
{
    public function userReserveBookQueue(int $userId, int $bookStockId, EReservationQueueStatus $status, int $priority)
    {
        $model = ReservationQueue::query()->create([
            'user_id' => $userId,
            'book_stock_id' => $bookStockId,
            'status' => $status,
            'priority' => $priority,
        ]);

        $model->setCacheData();

        return $model;
    }

    public function updateStatusReservationQueue(int $reservationQueueId, EReservationQueueStatus $status): bool
    {
        $updated = ReservationQueue::query()
            ->where('id', $reservationQueueId)
            ->update([
                'status' => $status,
            ]);

        if ($updated > 0) {
            ReservationQueue::clearCacheById($reservationQueueId);
            return true;
        }

        return false;
    }
}
