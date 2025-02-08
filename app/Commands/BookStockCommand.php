<?php

namespace App\Commands;

class BookStockCommand
{
    public $id;
    public $book_id;
    public $edition_id;
    public $branch_id;
    public $total_copies;
    public $reserved_copies;

    public static function create($book_id, $edition_id, $branch_id, $total_copies, $reserved_copies)
    {
        $command = new self();
        $command->book_id = $book_id;
        $command->edition_id = $edition_id;
        $command->branch_id = $branch_id;
        $command->total_copies = $total_copies;
        $command->reserved_copies = $reserved_copies;

        return $command;
    }

    public static function update($id, $book_id = null, $edition_id = null, $branch_id = null, $total_copies = null, $reserved_copies = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($book_id)) {
            $command->book_id = $book_id;
        }
        if (!is_null($edition_id)) {
            $command->edition_id = $edition_id;
        }
        if (!is_null($branch_id)) {
            $command->branch_id = $branch_id;
        }
        if (!is_null($total_copies)) {
            $command->total_copies = $total_copies;
        }
        if (!is_null($reserved_copies)) {
            $command->reserved_copies = $reserved_copies;
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
