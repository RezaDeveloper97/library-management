<?php

namespace App\Handlers;

use App\Models\Book;
use App\DTOs\BookDTO;

class BookHandler extends BasicHandler
{
    public function create(BookDTO $dto)
    {
        $model = Book::query()->create([
            'title' => $dto->title,
            'author_id' => $dto->author_id,
            'is_vip_only' => $dto->is_vip_only,
            'return_policy' => $dto->return_policy
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(BookDTO $dto)
    {
        $model = Book::query()->find($dto->id);

        if (!is_null($dto->title)) {
            $model->title = $dto->title;
        }
        if (!is_null($dto->author_id)) {
            $model->author_id = $dto->author_id;
        }
        if (!is_null($dto->is_vip_only)) {
            $model->is_vip_only = $dto->is_vip_only;
        }
        if (!is_null($dto->return_policy)) {
            $model->return_policy = $dto->return_policy;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(BookDTO $dto)
    {
        $model = Book::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
