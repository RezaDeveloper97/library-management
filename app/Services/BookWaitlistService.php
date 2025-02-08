<?php

namespace App\Services;

use App\Handlers\BookWaitlistHandler;
use App\DTOs\BookWaitlistDTO;

class BookWaitlistService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new BookWaitlistHandler();
    }

    public function create(BookWaitlistDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(BookWaitlistDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(BookWaitlistDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
