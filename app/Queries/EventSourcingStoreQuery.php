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

    public function getHistory($modelType, $modelId)
    {
        return EventSourcingStore::where('sourceable_type', $modelType)
            ->where('sourceable_id', $modelId)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
