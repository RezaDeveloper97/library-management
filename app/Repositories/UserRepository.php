<?php

namespace App\Repositories;

use App\Queries\UserQuery;

class UserRepository
{
    protected $query;

    public function __construct(UserQuery $query)
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
