<?php

namespace App\Repositories;

use App\Queries\ReservationQueueQuery;

class ReservationQueueRepository
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
}
