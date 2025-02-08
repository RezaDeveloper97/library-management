<?php

namespace App\Repositories;

use App\Queries\EventSourcingStoreQuery;

class EventSourcingStoreRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new EventSourcingStoreQuery();
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
