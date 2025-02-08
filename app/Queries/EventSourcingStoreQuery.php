<?php

namespace App\Queries;

use App\Models\EventSourcingStore;

class EventSourcingStoreQuery
{
    public function findById($id)
    {
        return EventSourcingStore::find($id);
    }

    public function getAll()
    {
        return EventSourcingStore::all();
    }
}
