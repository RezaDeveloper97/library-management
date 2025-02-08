<?php
namespace App\Jobs;

use App\Commands\EventSourcingStoreCommand;
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

    protected EventSourcingStoreCommand $command;

    public function __construct(EventSourcingStoreCommand $command)
    {
        $this->command = $command;
    }

    public function handle()
    {
        $handler = new EventSourcingStoreHandler();
        $handler->create($this->command);
    }
}
