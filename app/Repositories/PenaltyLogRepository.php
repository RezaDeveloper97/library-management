<?php

namespace App\Repositories;

use App\Queries\PenaltyLogQuery;

class PenaltyLogRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new PenaltyLogQuery();
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
