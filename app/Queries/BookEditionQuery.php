<?php

namespace App\Queries;

use App\Models\BookEdition;

class BookEditionQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = BookEdition::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return BookEdition::all();
    }
}
