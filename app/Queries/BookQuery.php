<?php

namespace App\Queries;

use App\Models\Book;

class BookQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Book::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Book::all();
    }
}
