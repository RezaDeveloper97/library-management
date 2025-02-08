<?php

namespace App\Services;

use App\Handlers\BookEditionHandler;
use App\DTOs\BookEditionDTO;

class BookEditionService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new BookEditionHandler();
    }

    public function create(BookEditionDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(BookEditionDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(BookEditionDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
