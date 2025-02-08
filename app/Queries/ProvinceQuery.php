<?php

namespace App\Queries;

use App\Models\Province;

class ProvinceQuery
{
    public function findById($id)
    {
        return Province::find($id);
    }

    public function getAll()
    {
        return Province::all();
    }
}
