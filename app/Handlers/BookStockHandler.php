<?php

namespace App\Handlers;

use App\Commands\BookStockCommand;
use App\Models\BookStock;

class BookStockHandler
{
    public function create(BookStockCommand $command)
    {
        return BookStock::create([
            'book_id' => $command->book_id,
            'edition_id' => $command->edition_id,
            'branch_id' => $command->branch_id,
            'total_copies' => $command->total_copies,
            'reserved_copies' => $command->reserved_copies
        ]);
    }

    public function update(BookStockCommand $command)
    {
        $model = BookStock::findOrFail($command->id);

        if (!is_null($command->book_id)) {
            $model->book_id = $command->book_id;
        }
        if (!is_null($command->edition_id)) {
            $model->edition_id = $command->edition_id;
        }
        if (!is_null($command->branch_id)) {
            $model->branch_id = $command->branch_id;
        }
        if (!is_null($command->total_copies)) {
            $model->total_copies = $command->total_copies;
        }
        if (!is_null($command->reserved_copies)) {
            $model->reserved_copies = $command->reserved_copies;
        }

        $model->save();

        return $model;
    }

    public function delete(BookStockCommand $command)
    {
        $model = BookStock::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
