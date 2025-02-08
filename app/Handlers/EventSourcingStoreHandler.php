<?php

namespace App\Handlers;

use App\Commands\EventSourcingStoreCommand;
use App\Models\EventSourcingStore;

class EventSourcingStoreHandler
{
    public function create(EventSourcingStoreCommand $command)
    {
        return EventSourcingStore::create([
            'event_type' => $command->event_type,
            'sourceable_type' => $command->sourceable_type,
            'sourceable_id' => $command->sourceable_id,
            'event_data' => $command->event_data
        ]);
    }

    public function update(EventSourcingStoreCommand $command)
    {
        $model = EventSourcingStore::findOrFail($command->id);

        if (!is_null($command->event_type)) {
            $model->event_type = $command->event_type;
        }
        if (!is_null($command->sourceable_type)) {
            $model->sourceable_type = $command->sourceable_type;
        }
        if (!is_null($command->sourceable_id)) {
            $model->sourceable_id = $command->sourceable_id;
        }
        if (!is_null($command->event_data)) {
            $model->event_data = $command->event_data;
        }

        $model->save();

        return $model;
    }

    public function delete(EventSourcingStoreCommand $command)
    {
        $model = EventSourcingStore::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
