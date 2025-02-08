<?php

namespace App\Services;

use App\Handlers\SystemRuleHandler;
use App\DTOs\SystemRuleDTO;

class SystemRuleService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new SystemRuleHandler();
    }

    public function create(SystemRuleDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(SystemRuleDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(SystemRuleDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
