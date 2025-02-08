<?php

namespace App\Queries;

use App\Models\EventSourcingStore;

class EventSourcingStoreQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = EventSourcingStore::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
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
