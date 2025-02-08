<?php

namespace App\Queries;

use App\Models\ReservationQueue;

class ReservationQueueQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = ReservationQueue::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return ReservationQueue::all();
    }
}
