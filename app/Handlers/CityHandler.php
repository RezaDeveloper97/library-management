<?php

namespace App\Handlers;

use App\Commands\CityCommand;
use App\Models\City;

class CityHandler
{
    public function create(CityCommand $command)
    {
        return City::create([
            'province_id' => $command->province_id,
            'name' => $command->name
        ]);
    }

    public function update(CityCommand $command)
    {
        $model = City::findOrFail($command->id);

        if (!is_null($command->province_id)) {
            $model->province_id = $command->province_id;
        }
        if (!is_null($command->name)) {
            $model->name = $command->name;
        }

        $model->save();

        return $model;
    }

    public function delete(CityCommand $command)
    {
        $model = City::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
