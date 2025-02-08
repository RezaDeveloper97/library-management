<?php

namespace App\Traits;

use App\Commands\EventSourcingStoreCommand;
use App\Jobs\EventSourcingStoreJob;
use App\Repositories\EventSourcingStoreRepository;

trait EventSourcingTrait
{
    public static function bootEventSourcingTrait()
    {
        static::created(function ($model) {
            $model->storeEvent('Created', $model->getAttributes());
        });

        static::updated(function ($model) {
            $model->storeEvent('Updated', $model->getChanges());
        });

        static::deleted(function ($model) {
            $model->storeEvent('Deleted', $model->getAttributes());
        });
    }

    public function storeEvent($eventType, $eventData = [])
    {
        $command = EventSourcingStoreCommand::create(
            $eventType,
            get_class($this),
            $this->id,
            $eventData
        );

        EventSourcingStoreJob::dispatch($command);
    }

    public function getEventHistory()
    {
        $repository = new EventSourcingStoreRepository();
        return $repository->getHistory(get_class($this), $this->id);
    }
}
