<?php

namespace App\Queries;

use App\Models\ScoreLog;

class ScoreLogQuery
{
    public function findById($id)
    {
        return ScoreLog::find($id);
    }

    public function getAll()
    {
        return ScoreLog::all();
    }
}
