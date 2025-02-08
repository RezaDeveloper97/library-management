<?php

namespace App\Queries;

use App\Models\Author;

class AuthorQuery
{
    public function findById($id)
    {
        return Author::find($id);
    }

    public function getAll()
    {
        return Author::all();
    }
}
