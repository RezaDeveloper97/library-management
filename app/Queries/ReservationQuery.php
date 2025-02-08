<?php

namespace App\Queries;

use App\Models\Reservation;

class ReservationQuery
{
    public function findById($id)
    {
        return Reservation::find($id);
    }

    public function getAll()
    {
        return Reservation::all();
    }
}
