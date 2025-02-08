<?php

namespace App\Handlers;

use App\Models\Author;
use App\DTOs\AuthorDTO;

class AuthorHandler extends BasicHandler
{
    public function create(AuthorDTO $dto)
    {
        $model = Author::query()->create([
            'name' => $dto->name
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(AuthorDTO $dto)
    {
        $model = Author::query()->find($dto->id);

        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(AuthorDTO $dto)
    {
        $model = Author::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
