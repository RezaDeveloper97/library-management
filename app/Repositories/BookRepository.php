<?php

namespace App\Repositories;

use App\Queries\BookQuery;
use Illuminate\Database\Eloquent\Collection;

class BookRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookQuery();
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }

    public function searchByTitle(string $title): Collection
    {
        return $this->query->searchByTitle($title);
    }
}
