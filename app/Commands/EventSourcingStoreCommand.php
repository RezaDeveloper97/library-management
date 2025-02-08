<?php

namespace App\Commands;

class EventSourcingStoreCommand
{
    public $id;
    public $event_type;
    public $sourceable_type;
    public $sourceable_id;
    public $event_data;

    public static function create($event_type, $sourceable_type, $sourceable_id, $event_data)
    {
        $command = new self();
        $command->event_type = $event_type;
        $command->sourceable_type = $sourceable_type;
        $command->sourceable_id = $sourceable_id;
        $command->event_data = $event_data;

        return $command;
    }

    public static function update($id, $event_type = null, $sourceable_type = null, $sourceable_id = null, $event_data = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($event_type)) {
            $command->event_type = $event_type;
        }
        if (!is_null($sourceable_type)) {
            $command->sourceable_type = $sourceable_type;
        }
        if (!is_null($sourceable_id)) {
            $command->sourceable_id = $sourceable_id;
        }
        if (!is_null($event_data)) {
            $command->event_data = $event_data;
        }

        return $command;
    }

    public static function delete($id)
    {
        $command = new self();
        $command->id = $id;

        return $command;
    }
}
