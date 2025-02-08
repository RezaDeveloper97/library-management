<?php

namespace App\Handlers;

use App\Models\Reservation;
use App\DTOs\ReservationDTO;

class ReservationHandler extends BasicHandler
{
    public function create(ReservationDTO $dto)
    {
        $model = Reservation::query()->create([
            'user_id' => $dto->user_id,
            'book_id' => $dto->book_id,
            'edition_id' => $dto->edition_id,
            'branch_id' => $dto->branch_id,
            'status' => $dto->status,
            'reserved_at' => $dto->reserved_at,
            'due_date' => $dto->due_date,
            'returned_at' => $dto->returned_at
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(ReservationDTO $dto)
    {
        $model = Reservation::query()->find($dto->id);

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
        if (!is_null($dto->reserved_at)) {
            $model->reserved_at = $dto->reserved_at;
        }
        if (!is_null($dto->due_date)) {
            $model->due_date = $dto->due_date;
        }
        if (!is_null($dto->returned_at)) {
            $model->returned_at = $dto->returned_at;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(ReservationDTO $dto)
    {
        $model = Reservation::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
