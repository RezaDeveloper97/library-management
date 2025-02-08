<?php

namespace App\Handlers;

use App\Models\City;
use App\DTOs\CityDTO;

class CityHandler extends BasicHandler
{
    public function create(CityDTO $dto)
    {
        $model = City::query()->create([
            'province_id' => $dto->province_id,
            'name' => $dto->name
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(CityDTO $dto)
    {
        $model = City::query()->find($dto->id);

        if (!is_null($dto->province_id)) {
            $model->province_id = $dto->province_id;
        }
        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(CityDTO $dto)
    {
        $model = City::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
