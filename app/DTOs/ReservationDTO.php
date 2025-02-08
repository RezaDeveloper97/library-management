<?php

namespace App\DTOs;

class ReservationDTO extends BasicDTO
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
        $dto = new self();
        $dto->user_id = $user_id;
        $dto->book_id = $book_id;
        $dto->edition_id = $edition_id;
        $dto->branch_id = $branch_id;
        $dto->status = $status;
        $dto->reserved_at = $reserved_at;
        $dto->due_date = $due_date;
        $dto->returned_at = $returned_at;

        return $dto;
    }

    public static function update($id, $user_id = null, $book_id = null, $edition_id = null, $branch_id = null, $status = null, $reserved_at = null, $due_date = null, $returned_at = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($user_id)) {
            $dto->user_id = $user_id;
        }
        if (!is_null($book_id)) {
            $dto->book_id = $book_id;
        }
        if (!is_null($edition_id)) {
            $dto->edition_id = $edition_id;
        }
        if (!is_null($branch_id)) {
            $dto->branch_id = $branch_id;
        }
        if (!is_null($status)) {
            $dto->status = $status;
        }
        if (!is_null($reserved_at)) {
            $dto->reserved_at = $reserved_at;
        }
        if (!is_null($due_date)) {
            $dto->due_date = $due_date;
        }
        if (!is_null($returned_at)) {
            $dto->returned_at = $returned_at;
        }

        return $dto;
    }

    public static function delete($id)
    {
        $dto = new self();
        $dto->id = $id;

        return $dto;
    }
}
