<?php

namespace App\Queries;

use App\Models\BookStock;

class BookStockQuery
{
    public function findById($id)
    {
        return BookStock::find($id);
    }

    public function getAll()
    {
        return BookStock::all();
    }
}
