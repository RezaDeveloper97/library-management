<?php

namespace App\Queries;

use App\Enums\EReservationQueueStatus;
use App\Models\ReservationQueue;

class ReservationQueueQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = ReservationQueue::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return ReservationQueue::all();
    }

    public function isWaitingStatusByUserId(int $userId): bool
    {
        return ReservationQueue::query()
            ->where('user_id', $userId)
            ->where('status', EReservationQueueStatus::Waiting)
            ->exists();
    }

    public function getHighestPriorityReservation(int $bookStockId): ReservationQueue
    {
        return ReservationQueue::query()
            ->where('book_stock_id', $bookStockId)
            ->where('status', EReservationQueueStatus::Waiting)
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'asc')
            ->first();
    }
}
