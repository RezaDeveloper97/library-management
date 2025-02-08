<?php

namespace App\Services;

use App\Handlers\EventSourcingStoreHandler;
use App\DTOs\EventSourcingStoreDTO;

class EventSourcingStoreService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new EventSourcingStoreHandler();
    }

    public function create(EventSourcingStoreDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(EventSourcingStoreDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(EventSourcingStoreDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
