<?php

namespace App\Services;

use App\Handlers\UserHandler;
use App\DTOs\UserDTO;

class UserService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new UserHandler();
    }

    public function create(UserDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(UserDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(UserDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
