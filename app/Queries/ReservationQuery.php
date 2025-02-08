<?php

namespace App\Queries;

use App\Models\Reservation;

class ReservationQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Reservation::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return Reservation::all();
    }
}
