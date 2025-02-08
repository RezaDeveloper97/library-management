<?php

namespace App\Handlers;

use App\Commands\ReservationCommand;
use App\Models\Reservation;

class ReservationHandler
{
    public function create(ReservationCommand $command)
    {
        return Reservation::create([
            'user_id' => $command->user_id,
            'book_id' => $command->book_id,
            'edition_id' => $command->edition_id,
            'branch_id' => $command->branch_id,
            'status' => $command->status,
            'reserved_at' => $command->reserved_at,
            'due_date' => $command->due_date,
            'returned_at' => $command->returned_at
        ]);
    }

    public function update(ReservationCommand $command)
    {
        $model = Reservation::findOrFail($command->id);

        if (!is_null($command->user_id)) {
            $model->user_id = $command->user_id;
        }
        if (!is_null($command->book_id)) {
            $model->book_id = $command->book_id;
        }
        if (!is_null($command->edition_id)) {
            $model->edition_id = $command->edition_id;
        }
        if (!is_null($command->branch_id)) {
            $model->branch_id = $command->branch_id;
        }
        if (!is_null($command->status)) {
            $model->status = $command->status;
        }
        if (!is_null($command->reserved_at)) {
            $model->reserved_at = $command->reserved_at;
        }
        if (!is_null($command->due_date)) {
            $model->due_date = $command->due_date;
        }
        if (!is_null($command->returned_at)) {
            $model->returned_at = $command->returned_at;
        }

        $model->save();

        return $model;
    }

    public function delete(ReservationCommand $command)
    {
        $model = Reservation::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
