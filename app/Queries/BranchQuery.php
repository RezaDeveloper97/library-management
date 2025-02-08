<?php

namespace App\Queries;

use App\Models\Branch;

class BranchQuery
{
    public function findById($id)
    {
        return Branch::find($id);
    }

    public function getAll()
    {
        return Branch::all();
    }
}
