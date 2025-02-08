<?php

namespace App\Handlers;

use App\Models\Branch;
use App\DTOs\BranchDTO;

class BranchHandler extends BasicHandler
{
    public function create(BranchDTO $dto)
    {
        $model = Branch::query()->create([
            'city_id' => $dto->city_id,
            'name' => $dto->name,
            'address' => $dto->address,
            'postal_code' => $dto->postal_code,
            'latitude' => $dto->latitude,
            'longitude' => $dto->longitude
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(BranchDTO $dto)
    {
        $model = Branch::query()->find($dto->id);

        if (!is_null($dto->city_id)) {
            $model->city_id = $dto->city_id;
        }
        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }
        if (!is_null($dto->address)) {
            $model->address = $dto->address;
        }
        if (!is_null($dto->postal_code)) {
            $model->postal_code = $dto->postal_code;
        }
        if (!is_null($dto->latitude)) {
            $model->latitude = $dto->latitude;
        }
        if (!is_null($dto->longitude)) {
            $model->longitude = $dto->longitude;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(BranchDTO $dto)
    {
        $model = Branch::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
