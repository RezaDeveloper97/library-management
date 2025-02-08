<?php

namespace App\Queries;

use App\Models\PenaltyLog;

class PenaltyLogQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = PenaltyLog::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return PenaltyLog::all();
    }
}
