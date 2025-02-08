<?php

namespace App\Services;

use App\Handlers\ProvinceHandler;
use App\DTOs\ProvinceDTO;

class ProvinceService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new ProvinceHandler();
    }

    public function create(ProvinceDTO $dto)
    {
        return $this->handler->create($dto);
    }

    public function update(ProvinceDTO $dto)
    {
        return $this->handler->update($dto);
    }

    public function delete(ProvinceDTO $dto)
    {
        return $this->handler->delete($dto);
    }
}
