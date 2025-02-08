<?php

namespace App\Repositories;

use App\Queries\BookWaitlistQuery;

class BookWaitlistRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookWaitlistQuery();
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
