<?php

namespace App\Queries;

use App\Models\Author;

class AuthorQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Author::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Author::all();
    }
}
