<?php

namespace App\Queries;

use App\Models\City;

class CityQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = City::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return City::all();
    }
}
