<?php

namespace App\Repositories;

use App\Queries\ScoreLogQuery;

class ScoreLogRepository
{
    protected $query;

    public function __construct(ScoreLogQuery $query)
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
