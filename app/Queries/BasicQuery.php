<?php

namespace App\Queries;

abstract class BasicQuery
{
    public function getModelData($model)
    {
        $cachedData = $model?->getCacheData();

        if ($cachedData) {
            return $cachedData;
        }

        $model?->setCacheData();

        return $model;
    }
}
