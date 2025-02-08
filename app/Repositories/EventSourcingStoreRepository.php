<?php

namespace App\Repositories;

use App\Queries\EventSourcingStoreQuery;

class EventSourcingStoreRepository extends BasicRepository
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

    public function getHistory($modelType, $modelId)
    {
        return $this->query->getHistory($modelType, $modelId);
    }
}
