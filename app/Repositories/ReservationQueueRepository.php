<?php

namespace App\Repositories;

use App\Models\ReservationQueue;
use App\Queries\ReservationQueueQuery;

class ReservationQueueRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new ReservationQueueQuery();
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }

    public function isWaitingStatusByUserId(int $userId): bool
    {
        return $this->query->isWaitingStatusByUserId($userId);
    }

    public function getHighestPriorityReservation(int $bookStockId): ReservationQueue
    {
        return $this->query->getHighestPriorityReservation($bookStockId);
    }
}
