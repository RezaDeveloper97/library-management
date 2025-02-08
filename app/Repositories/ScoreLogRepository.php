<?php

namespace App\Repositories;

use App\Queries\ScoreLogQuery;

class ScoreLogRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new ScoreLogQuery();
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
