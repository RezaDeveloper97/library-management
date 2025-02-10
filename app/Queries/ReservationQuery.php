<?php

namespace App\Queries;

use App\Models\Reservation;

class ReservationQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Reservation::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return Reservation::all();
    }
}
