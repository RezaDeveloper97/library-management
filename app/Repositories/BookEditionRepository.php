<?php

namespace App\Repositories;

use App\Queries\BookEditionQuery;

class BookEditionRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookEditionQuery();
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
