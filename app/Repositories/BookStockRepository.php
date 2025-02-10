<?php

namespace App\Repositories;

use App\Models\BookStock;
use App\Queries\BookStockQuery;

class BookStockRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BookStockQuery();
    }

    public function findById(int $id): ?BookStock
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }

    public function isBookAvailableInStock(int $bookStockId): bool
    {
        return $this->query->isBookAvailableInStock($bookStockId);
    }

    public function getListOfBookInStock(int $perPage = 10, ?array $booksId = null, ?array $editionsId = null, ?array $branchesId = null)
    {
        return $this->query->getListOfBookInStock($perPage, $booksId, $editionsId, $branchesId);
    }
}
