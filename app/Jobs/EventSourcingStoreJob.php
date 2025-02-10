<?php

namespace App\Jobs;

use App\DTOs\EventSourcingStoreDTO;
use App\Handlers\EventSourcingStoreHandler;
use App\Models\EventSourcingStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EventSourcingStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected EventSourcingStoreDTO $dto;

    public function __construct(EventSourcingStoreDTO $dto)
    {
        $this->onQueue('event-sourcing');
        $this->dto = $dto;
    }

    public function handle()
    {
        $handler = new EventSourcingStoreHandler();
        $handler->create($this->dto);
    }
}
