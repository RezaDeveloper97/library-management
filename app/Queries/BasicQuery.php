<?php

namespace App\Queries;

abstract class BasicQuery
{
    protected function getModelData($model)
    {
        $cachedData = $model?->getCacheData();

        if ($cachedData) {
            return $cachedData;
        }

        $model?->setCacheData();

        return $model;
    }
}
