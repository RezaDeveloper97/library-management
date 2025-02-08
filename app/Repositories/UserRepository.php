<?php

namespace App\Repositories;

use App\Queries\UserQuery;

class UserRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new UserQuery();
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
