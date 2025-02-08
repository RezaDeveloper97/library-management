<?php

namespace App\Repositories;

use App\Queries\BookQuery;

class BookRepository
{
    protected $query;

    public function __construct(BookQuery $query)
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
