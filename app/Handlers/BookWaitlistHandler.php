<?php

namespace App\Handlers;

use App\Models\BookWaitlist;
use App\DTOs\BookWaitlistDTO;

class BookWaitlistHandler extends BasicHandler
{
    public function create(BookWaitlistDTO $dto)
    {
        $model = BookWaitlist::query()->create([
            'user_id' => $dto->user_id,
            'book_id' => $dto->book_id,
            'edition_id' => $dto->edition_id,
            'branch_id' => $dto->branch_id,
            'status' => $dto->status
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(BookWaitlistDTO $dto)
    {
        $model = BookWaitlist::query()->find($dto->id);

        if (!is_null($dto->user_id)) {
            $model->user_id = $dto->user_id;
        }
        if (!is_null($dto->book_id)) {
            $model->book_id = $dto->book_id;
        }
        if (!is_null($dto->edition_id)) {
            $model->edition_id = $dto->edition_id;
        }
        if (!is_null($dto->branch_id)) {
            $model->branch_id = $dto->branch_id;
        }
        if (!is_null($dto->status)) {
            $model->status = $dto->status;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(BookWaitlistDTO $dto)
    {
        $model = BookWaitlist::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
