<?php

namespace App\DTOs;

class EventSourcingStoreDTO extends BasicDTO
{
    public $id;
    public $event_type;
    public $sourceable_type;
    public $sourceable_id;
    public $event_data;

    public static function create($event_type, $sourceable_type, $sourceable_id, $event_data)
    {
        $dto = new self();
        $dto->event_type = $event_type;
        $dto->sourceable_type = $sourceable_type;
        $dto->sourceable_id = $sourceable_id;
        $dto->event_data = $event_data;

        return $dto;
    }

    public static function update($id, $event_type = null, $sourceable_type = null, $sourceable_id = null, $event_data = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($event_type)) {
            $dto->event_type = $event_type;
        }
        if (!is_null($sourceable_type)) {
            $dto->sourceable_type = $sourceable_type;
        }
        if (!is_null($sourceable_id)) {
            $dto->sourceable_id = $sourceable_id;
        }
        if (!is_null($event_data)) {
            $dto->event_data = $event_data;
        }

        return $dto;
    }

    public static function delete($id)
    {
        $dto = new self();
        $dto->id = $id;

        return $dto;
    }
}
