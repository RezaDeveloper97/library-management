<?php

namespace App\Repositories;

use App\Queries\ReservationQuery;

class ReservationRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new ReservationQuery();
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
