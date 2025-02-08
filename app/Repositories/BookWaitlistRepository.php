<?php

namespace App\Repositories;

use App\Queries\BookWaitlistQuery;

class BookWaitlistRepository
{
    protected $query;

    public function __construct(BookWaitlistQuery $query)
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
