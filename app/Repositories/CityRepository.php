<?php

namespace App\Repositories;

use App\Queries\CityQuery;

class CityRepository
{
    protected $query;

    public function __construct(CityQuery $query)
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
