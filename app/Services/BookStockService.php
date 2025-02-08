<?php

namespace App\Services;

use App\Handlers\BookStockHandler;
use App\DTOs\BookStockDTO;

class BookStockService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new BookStockHandler();
    }

    public function create(BookStockDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(BookStockDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(BookStockDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
