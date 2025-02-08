<?php

namespace App\Services;

use App\Handlers\ReservationHandler;
use App\DTOs\ReservationDTO;

class ReservationService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new ReservationHandler();
    }

    public function create(ReservationDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(ReservationDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(ReservationDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
