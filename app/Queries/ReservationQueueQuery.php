<?php

namespace App\Queries;

use App\Models\ReservationQueue;

class ReservationQueueQuery
{
    public function findById($id)
    {
        return ReservationQueue::find($id);
    }

    public function getAll()
    {
        return ReservationQueue::all();
    }
}
