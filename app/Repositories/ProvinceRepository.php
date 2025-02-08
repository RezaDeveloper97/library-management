<?php

namespace App\Repositories;

use App\Queries\ProvinceQuery;

class ProvinceRepository
{
    protected $query;

    public function __construct(ProvinceQuery $query)
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
