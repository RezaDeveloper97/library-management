<?php

namespace App\Repositories;

use App\Queries\BookStockQuery;

class BookStockRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookStockQuery();
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
