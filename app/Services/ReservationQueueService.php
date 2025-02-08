<?php

namespace App\Services;

use App\Handlers\ReservationQueueHandler;
use App\DTOs\ReservationQueueDTO;

class ReservationQueueService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new ReservationQueueHandler();
    }

    public function create(ReservationQueueDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(ReservationQueueDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(ReservationQueueDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
