<?php

namespace App\Handlers;

use App\Commands\AuthorCommand;
use App\Models\Author;

class AuthorHandler
{
    public function create(AuthorCommand $command)
    {
        return Author::create([
            'name' => $command->name
        ]);
    }

    public function update(AuthorCommand $command)
    {
        $model = Author::findOrFail($command->id);

        if (!is_null($command->name)) {
            $model->name = $command->name;
        }

        $model->save();

        return $model;
    }

    public function delete(AuthorCommand $command)
    {
        $model = Author::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
