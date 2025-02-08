<?php

namespace App\Repositories;

use App\Queries\ProvinceQuery;

class ProvinceRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new ProvinceQuery();
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
