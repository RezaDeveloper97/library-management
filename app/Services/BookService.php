<?php

namespace App\Services;

use App\Handlers\BookHandler;
use App\DTOs\BookDTO;

class BookService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new BookHandler();
    }

    public function create(BookDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(BookDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(BookDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
