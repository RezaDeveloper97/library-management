<?php

namespace App\Queries;

use App\Models\SystemRule;

class SystemRuleQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = SystemRule::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return SystemRule::all();
    }
}
