<?php

namespace App\Queries;

use App\Models\BookStock;

class BookStockQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = BookStock::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return BookStock::all();
    }
}
