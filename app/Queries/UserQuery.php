<?php

namespace App\Queries;

use App\Models\User;

class UserQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = User::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return User::all();
    }
}
