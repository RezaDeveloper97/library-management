<?php

namespace App\Repositories;

use App\Queries\AuthorQuery;

class AuthorRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new AuthorQuery();
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
