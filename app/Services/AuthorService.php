<?php

namespace App\Services;

use App\Handlers\AuthorHandler;
use App\DTOs\AuthorDTO;

class AuthorService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new AuthorHandler();
    }

    public function create(AuthorDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(AuthorDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(AuthorDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
