<?php

namespace App\Queries;

use App\Models\Province;

class ProvinceQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Province::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Province::all();
    }
}
