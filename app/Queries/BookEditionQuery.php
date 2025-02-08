<?php

namespace App\Queries;

use App\Models\BookEdition;

class BookEditionQuery
{
    public function findById($id)
    {
        return BookEdition::find($id);
    }

    public function getAll()
    {
        return BookEdition::all();
    }
}
