<?php

namespace App\Services;

use App\Handlers\BranchHandler;
use App\DTOs\BranchDTO;

class BranchService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new BranchHandler();
    }

    public function create(BranchDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(BranchDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(BranchDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
