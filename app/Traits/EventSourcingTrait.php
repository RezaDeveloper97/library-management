<?php

namespace App\Traits;

use App\DTOs\EventSourcingStoreDTO;
use App\Jobs\EventSourcingStoreJob;
use App\Repositories\EventSourcingStoreRepository;

trait EventSourcingTrait
{
    public static function bootEventSourcingTrait(): void
    {
        static::created(fn($model) => $model->storeEvent('Created', $model->getAttributes()));

        static::updated(fn($model) => $model->storeEvent('Updated', $model->getChanges()));

        static::deleted(fn($model) => $model->storeEvent('Deleted', $model->getAttributes()));
    }

    public function storeEvent($eventType, $eventData = []): void
    {
        $dto = new EventSourcingStoreDTO;
        $dto->event_type = $eventType;
        $dto->sourceable_type = get_class($this);
        $dto->sourceable_id = $this->id;
        $dto->event_data = $eventData;

        EventSourcingStoreJob::dispatch($dto);
    }

    public function getEventHistory()
    {
        $repository = new EventSourcingStoreRepository();
        return $repository->getHistory(get_class($this), $this->id);
    }
}
