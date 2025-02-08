<?php

namespace App\Services;

use App\Handlers\CityHandler;
use App\DTOs\CityDTO;

class CityService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new CityHandler();
    }

    public function create(CityDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(CityDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(CityDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
