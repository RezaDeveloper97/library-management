<?php

namespace App\Commands;

class ReservationCommand
{
    public $id;
    public $user_id;
    public $book_id;
    public $edition_id;
    public $branch_id;
    public $status;
    public $reserved_at;
    public $due_date;
    public $returned_at;

    public static function create($user_id, $book_id, $edition_id, $branch_id, $status, $reserved_at, $due_date, $returned_at)
    {
        $command = new self();
        $command->user_id = $user_id;
        $command->book_id = $book_id;
        $command->edition_id = $edition_id;
        $command->branch_id = $branch_id;
        $command->status = $status;
        $command->reserved_at = $reserved_at;
        $command->due_date = $due_date;
        $command->returned_at = $returned_at;

        return $command;
    }

    public static function update($id, $user_id = null, $book_id = null, $edition_id = null, $branch_id = null, $status = null, $reserved_at = null, $due_date = null, $returned_at = null)
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
        if (!is_null($reserved_at)) {
            $command->reserved_at = $reserved_at;
        }
        if (!is_null($due_date)) {
            $command->due_date = $due_date;
        }
        if (!is_null($returned_at)) {
            $command->returned_at = $returned_at;
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
