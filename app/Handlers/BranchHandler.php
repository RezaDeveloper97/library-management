<?php

namespace App\Handlers;

use App\Commands\BranchCommand;
use App\Models\Branch;

class BranchHandler
{
    public function create(BranchCommand $command)
    {
        return Branch::create([
            'city_id' => $command->city_id,
            'name' => $command->name,
            'address' => $command->address,
            'postal_code' => $command->postal_code,
            'latitude' => $command->latitude,
            'longitude' => $command->longitude
        ]);
    }

    public function update(BranchCommand $command)
    {
        $model = Branch::findOrFail($command->id);

        if (!is_null($command->city_id)) {
            $model->city_id = $command->city_id;
        }
        if (!is_null($command->name)) {
            $model->name = $command->name;
        }
        if (!is_null($command->address)) {
            $model->address = $command->address;
        }
        if (!is_null($command->postal_code)) {
            $model->postal_code = $command->postal_code;
        }
        if (!is_null($command->latitude)) {
            $model->latitude = $command->latitude;
        }
        if (!is_null($command->longitude)) {
            $model->longitude = $command->longitude;
        }

        $model->save();

        return $model;
    }

    public function delete(BranchCommand $command)
    {
        $model = Branch::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
