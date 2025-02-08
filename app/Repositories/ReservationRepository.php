<?php

namespace App\Repositories;

use App\Queries\ReservationQuery;

class ReservationRepository
{
    protected $query;

    public function __construct(ReservationQuery $query)
    {
        $this->query = $query;
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
