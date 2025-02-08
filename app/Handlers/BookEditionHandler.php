<?php

namespace App\Handlers;

use App\Models\BookEdition;
use App\DTOs\BookEditionDTO;

class BookEditionHandler extends BasicHandler
{
    public function create(BookEditionDTO $dto)
    {
        $model = BookEdition::query()->create([
            'book_id' => $dto->book_id,
            'publisher_id' => $dto->publisher_id,
            'edition_year' => $dto->edition_year
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(BookEditionDTO $dto)
    {
        $model = BookEdition::query()->find($dto->id);

        if (!is_null($dto->book_id)) {
            $model->book_id = $dto->book_id;
        }
        if (!is_null($dto->publisher_id)) {
            $model->publisher_id = $dto->publisher_id;
        }
        if (!is_null($dto->edition_year)) {
            $model->edition_year = $dto->edition_year;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(BookEditionDTO $dto)
    {
        $model = BookEdition::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
