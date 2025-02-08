<?php

namespace App\Repositories;

use App\Queries\AuthorQuery;

class AuthorRepository
{
    protected $query;

    public function __construct(AuthorQuery $query)
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
