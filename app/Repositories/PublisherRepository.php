<?php

namespace App\Repositories;

use App\Queries\PublisherQuery;

class PublisherRepository
{
    protected $query;

    public function __construct(PublisherQuery $query)
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
