<?php

namespace App\Repositories;

use App\Queries\BranchQuery;

class BranchRepository
{
    protected $query;

    public function __construct(BranchQuery $query)
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
