<?php

namespace App\Commands;

class BookEditionCommand
{
    public $id;
    public $book_id;
    public $publisher_id;
    public $edition_year;

    public static function create($book_id, $publisher_id, $edition_year)
    {
        $command = new self();
        $command->book_id = $book_id;
        $command->publisher_id = $publisher_id;
        $command->edition_year = $edition_year;

        return $command;
    }

    public static function update($id, $book_id = null, $publisher_id = null, $edition_year = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($book_id)) {
            $command->book_id = $book_id;
        }
        if (!is_null($publisher_id)) {
            $command->publisher_id = $publisher_id;
        }
        if (!is_null($edition_year)) {
            $command->edition_year = $edition_year;
        }

        return $command;
    }

    public static function delete($id)
    {
        $command = new self();
        $command->id = $id;

        return $command;
    }
}
