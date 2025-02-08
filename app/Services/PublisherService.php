<?php

namespace App\Services;

use App\Handlers\PublisherHandler;
use App\DTOs\PublisherDTO;

class PublisherService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new PublisherHandler();
    }

    public function create(PublisherDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(PublisherDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(PublisherDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
