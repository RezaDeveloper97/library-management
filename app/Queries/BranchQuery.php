<?php

namespace App\Queries;

use App\Models\Branch;

class BranchQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Branch::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Branch::all();
    }
}
