<?php

namespace App\Services;

use App\Handlers\ScoreLogHandler;
use App\DTOs\ScoreLogDTO;

class ScoreLogService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new ScoreLogHandler();
    }

    public function create(ScoreLogDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(ScoreLogDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(ScoreLogDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
