<?php

namespace App\Commands;

class BookWaitlistCommand
{
    public $id;
    public $user_id;
    public $book_id;
    public $edition_id;
    public $branch_id;
    public $status;

    public static function create($user_id, $book_id, $edition_id, $branch_id, $status)
    {
        $command = new self();
        $command->user_id = $user_id;
        $command->book_id = $book_id;
        $command->edition_id = $edition_id;
        $command->branch_id = $branch_id;
        $command->status = $status;

        return $command;
    }

    public static function update($id, $user_id = null, $book_id = null, $edition_id = null, $branch_id = null, $status = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($user_id)) {
            $command->user_id = $user_id;
        }
        if (!is_null($book_id)) {
            $command->book_id = $book_id;
        }
        if (!is_null($edition_id)) {
            $command->edition_id = $edition_id;
        }
        if (!is_null($branch_id)) {
            $command->branch_id = $branch_id;
        }
        if (!is_null($status)) {
            $command->status = $status;
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
