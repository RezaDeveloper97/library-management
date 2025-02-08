<?php

namespace App\Services;

use App\Handlers\PenaltyLogHandler;
use App\DTOs\PenaltyLogDTO;

class PenaltyLogService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new PenaltyLogHandler();
    }

    public function create(PenaltyLogDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(PenaltyLogDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(PenaltyLogDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
