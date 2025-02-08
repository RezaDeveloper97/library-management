<?php

namespace App\Handlers;

use App\Commands\BookEditionCommand;
use App\Models\BookEdition;

class BookEditionHandler
{
    public function create(BookEditionCommand $command)
    {
        return BookEdition::create([
            'book_id' => $command->book_id,
            'publisher_id' => $command->publisher_id,
            'edition_year' => $command->edition_year
        ]);
    }

    public function update(BookEditionCommand $command)
    {
        $model = BookEdition::findOrFail($command->id);

        if (!is_null($command->book_id)) {
            $model->book_id = $command->book_id;
        }
        if (!is_null($command->publisher_id)) {
            $model->publisher_id = $command->publisher_id;
        }
        if (!is_null($command->edition_year)) {
            $model->edition_year = $command->edition_year;
        }

        $model->save();

        return $model;
    }

    public function delete(BookEditionCommand $command)
    {
        $model = BookEdition::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
