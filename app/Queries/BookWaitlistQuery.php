<?php

namespace App\Queries;

use App\Models\BookWaitlist;

class BookWaitlistQuery
{
    public function findById($id)
    {
        return BookWaitlist::find($id);
    }

    public function getAll()
    {
        return BookWaitlist::all();
    }
}
