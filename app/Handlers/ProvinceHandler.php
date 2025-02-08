<?php

namespace App\Handlers;

use App\Commands\ProvinceCommand;
use App\Models\Province;

class ProvinceHandler
{
    public function create(ProvinceCommand $command)
    {
        return Province::create([
            'name' => $command->name
        ]);
    }

    public function update(ProvinceCommand $command)
    {
        $model = Province::findOrFail($command->id);

        if (!is_null($command->name)) {
            $model->name = $command->name;
        }

        $model->save();

        return $model;
    }

    public function delete(ProvinceCommand $command)
    {
        $model = Province::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
