<?php

namespace App\Queries;

use App\Models\Publisher;

class PublisherQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Publisher::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Publisher::all();
    }
}
