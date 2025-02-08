<?php

namespace App\Handlers;

use App\Models\BookStock;
use App\DTOs\BookStockDTO;

class BookStockHandler extends BasicHandler
{
    public function create(BookStockDTO $dto)
    {
        $model = BookStock::query()->create([
            'book_id' => $dto->book_id,
            'edition_id' => $dto->edition_id,
            'branch_id' => $dto->branch_id,
            'total_copies' => $dto->total_copies,
            'reserved_copies' => $dto->reserved_copies
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(BookStockDTO $dto)
    {
        $model = BookStock::query()->find($dto->id);

        if (!is_null($dto->book_id)) {
            $model->book_id = $dto->book_id;
        }
        if (!is_null($dto->edition_id)) {
            $model->edition_id = $dto->edition_id;
        }
        if (!is_null($dto->branch_id)) {
            $model->branch_id = $dto->branch_id;
        }
        if (!is_null($dto->total_copies)) {
            $model->total_copies = $dto->total_copies;
        }
        if (!is_null($dto->reserved_copies)) {
            $model->reserved_copies = $dto->reserved_copies;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(BookStockDTO $dto)
    {
        $model = BookStock::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
