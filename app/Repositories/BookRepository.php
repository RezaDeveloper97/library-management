<?php

namespace App\Repositories;

use App\Queries\BookQuery;

class BookRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookQuery();
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
