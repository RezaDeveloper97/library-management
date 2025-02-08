<?php

namespace App\Queries;

use App\Models\Publisher;

class PublisherQuery
{
    public function findById($id)
    {
        return Publisher::find($id);
    }

    public function getAll()
    {
        return Publisher::all();
    }
}
