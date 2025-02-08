<?php

namespace App\Repositories;

use App\Queries\BranchQuery;

class BranchRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BranchQuery();
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
