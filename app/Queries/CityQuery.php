<?php

namespace App\Queries;

use App\Models\City;

class CityQuery
{
    public function findById($id)
    {
        return City::find($id);
    }

    public function getAll()
    {
        return City::all();
    }
}
