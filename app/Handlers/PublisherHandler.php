<?php

namespace App\Handlers;

use App\Commands\PublisherCommand;
use App\Models\Publisher;

class PublisherHandler
{
    public function create(PublisherCommand $command)
    {
        return Publisher::create([
            'name' => $command->name
        ]);
    }

    public function update(PublisherCommand $command)
    {
        $model = Publisher::findOrFail($command->id);

        if (!is_null($command->name)) {
            $model->name = $command->name;
        }

        $model->save();

        return $model;
    }

    public function delete(PublisherCommand $command)
    {
        $model = Publisher::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
