<?php

namespace App\Handlers;

use App\Commands\ReservationQueueCommand;
use App\Models\ReservationQueue;

class ReservationQueueHandler
{
    public function create(ReservationQueueCommand $command)
    {
        return ReservationQueue::create([
            'user_id' => $command->user_id,
            'book_id' => $command->book_id,
            'edition_id' => $command->edition_id,
            'branch_id' => $command->branch_id,
            'priority' => $command->priority,
            'status' => $command->status
        ]);
    }

    public function update(ReservationQueueCommand $command)
    {
        $model = ReservationQueue::findOrFail($command->id);

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
        if (!is_null($command->priority)) {
            $model->priority = $command->priority;
        }
        if (!is_null($command->status)) {
            $model->status = $command->status;
        }

        $model->save();

        return $model;
    }

    public function delete(ReservationQueueCommand $command)
    {
        $model = ReservationQueue::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
