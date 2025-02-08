<?php

namespace App\Queries;

use App\Models\User;

class UserQuery
{
    public function findById($id)
    {
        return User::find($id);
    }

    public function getAll()
    {
        return User::all();
    }
}
