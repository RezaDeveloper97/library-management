<?php

namespace App\Repositories;

use App\Queries\PublisherQuery;

class PublisherRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new PublisherQuery();
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
