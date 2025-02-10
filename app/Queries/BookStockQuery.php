<?php

namespace App\Queries;

use App\Models\BookStock;

class BookStockQuery extends BasicQuery
{
    public function findById(int $id): ?BookStock
    {
        $model = BookStock::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return BookStock::all();
    }

    public function isBookAvailableInStock(int $bookStockId): bool
    {
        return BookStock::query()
            ->where('id', $bookStockId)
            ->whereColumn('total_copies', '>', 'reserved_copies')->exists();
    }

    public function getListOfBookInStock(int $perPage, ?array $booksId = null, ?array $editionsId = null, ?array $branchesId = null)
    {
        return BookStock::query()
            ->when($booksId && count($booksId) > 0, fn($query) => $query->whereIn('book_id', $booksId))
            ->when($editionsId && count($editionsId) > 0, fn($query) => $query->whereIn('edition_id', $editionsId))
            ->when($branchesId && count($branchesId) > 0, fn($query) => $query->whereIn('branch_id', $branchesId))
            ->paginate($perPage);
    }
}
