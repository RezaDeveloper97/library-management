<?php

namespace App\Queries;

use App\Models\Book;

class BookQuery
{
    public function findById($id)
    {
        return Book::find($id);
    }

    public function getAll()
    {
        return Book::all();
    }
}
