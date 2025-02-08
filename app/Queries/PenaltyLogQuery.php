<?php

namespace App\Queries;

use App\Models\PenaltyLog;

class PenaltyLogQuery
{
    public function findById($id)
    {
        return PenaltyLog::find($id);
    }

    public function getAll()
    {
        return PenaltyLog::all();
    }
}
