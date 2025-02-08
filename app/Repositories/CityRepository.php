<?php

namespace App\Repositories;

use App\Queries\CityQuery;

class CityRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new CityQuery();
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
