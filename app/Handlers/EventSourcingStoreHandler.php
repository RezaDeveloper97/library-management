<?php

namespace App\Handlers;

use App\Models\EventSourcingStore;
use App\DTOs\EventSourcingStoreDTO;

class EventSourcingStoreHandler extends BasicHandler
{
    public function create(EventSourcingStoreDTO $dto)
    {
        $model = EventSourcingStore::query()->create([
            'event_type' => $dto->event_type,
            'sourceable_type' => $dto->sourceable_type,
            'sourceable_id' => $dto->sourceable_id,
            'event_data' => $dto->event_data
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(EventSourcingStoreDTO $dto)
    {
        $model = EventSourcingStore::query()->find($dto->id);

        if (!is_null($dto->event_type)) {
            $model->event_type = $dto->event_type;
        }
        if (!is_null($dto->sourceable_type)) {
            $model->sourceable_type = $dto->sourceable_type;
        }
        if (!is_null($dto->sourceable_id)) {
            $model->sourceable_id = $dto->sourceable_id;
        }
        if (!is_null($dto->event_data)) {
            $model->event_data = $dto->event_data;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(EventSourcingStoreDTO $dto)
    {
        $model = EventSourcingStore::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
