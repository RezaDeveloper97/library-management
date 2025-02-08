<?php

namespace App\Handlers;

use App\Commands\BookWaitlistCommand;
use App\Models\BookWaitlist;

class BookWaitlistHandler
{
    public function create(BookWaitlistCommand $command)
    {
        return BookWaitlist::create([
            'user_id' => $command->user_id,
            'book_id' => $command->book_id,
            'edition_id' => $command->edition_id,
            'branch_id' => $command->branch_id,
            'status' => $command->status
        ]);
    }

    public function update(BookWaitlistCommand $command)
    {
        $model = BookWaitlist::findOrFail($command->id);

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

        $model->save();

        return $model;
    }

    public function delete(BookWaitlistCommand $command)
    {
        $model = BookWaitlist::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
