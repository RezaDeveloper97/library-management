<?php

namespace App\Handlers;

use App\Models\Province;
use App\DTOs\ProvinceDTO;

class ProvinceHandler extends BasicHandler
{
    public function create(ProvinceDTO $dto)
    {
        $model = Province::query()->create([
            'name' => $dto->name
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(ProvinceDTO $dto)
    {
        $model = Province::query()->find($dto->id);

        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(ProvinceDTO $dto)
    {
        $model = Province::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
