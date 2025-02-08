<?php

namespace App\Handlers;

use App\Commands\BookCommand;
use App\Models\Book;

class BookHandler
{
    public function create(BookCommand $command)
    {
        return Book::create([
            'title' => $command->title,
            'author_id' => $command->author_id,
            'is_vip_only' => $command->is_vip_only,
            'return_policy' => $command->return_policy
        ]);
    }

    public function update(BookCommand $command)
    {
        $model = Book::findOrFail($command->id);

        if (!is_null($command->title)) {
            $model->title = $command->title;
        }
        if (!is_null($command->author_id)) {
            $model->author_id = $command->author_id;
        }
        if (!is_null($command->is_vip_only)) {
            $model->is_vip_only = $command->is_vip_only;
        }
        if (!is_null($command->return_policy)) {
            $model->return_policy = $command->return_policy;
        }

        $model->save();

        return $model;
    }

    public function delete(BookCommand $command)
    {
        $model = Book::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
