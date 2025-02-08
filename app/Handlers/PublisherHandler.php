<?php

namespace App\Handlers;

use App\Models\Publisher;
use App\DTOs\PublisherDTO;

class PublisherHandler extends BasicHandler
{
    public function create(PublisherDTO $dto)
    {
        $model = Publisher::query()->create([
            'name' => $dto->name
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(PublisherDTO $dto)
    {
        $model = Publisher::query()->find($dto->id);

        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(PublisherDTO $dto)
    {
        $model = Publisher::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
