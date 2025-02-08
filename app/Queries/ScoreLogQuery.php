<?php

namespace App\Queries;

use App\Models\ScoreLog;

class ScoreLogQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = ScoreLog::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return ScoreLog::all();
    }
}
