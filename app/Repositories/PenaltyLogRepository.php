<?php

namespace App\Repositories;

use App\Queries\PenaltyLogQuery;

class PenaltyLogRepository
{
    protected $query;

    public function __construct(PenaltyLogQuery $query)
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
