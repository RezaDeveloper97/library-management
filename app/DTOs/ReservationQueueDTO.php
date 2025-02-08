<?php

namespace App\DTOs;

class ReservationQueueDTO extends BasicDTO
{
    public $id;
    public $user_id;
    public $book_id;
    public $edition_id;
    public $branch_id;
    public $priority;
    public $status;

    public static function create($user_id, $book_id, $edition_id, $branch_id, $priority, $status)
    {
        $dto = new self();
        $dto->user_id = $user_id;
        $dto->book_id = $book_id;
        $dto->edition_id = $edition_id;
        $dto->branch_id = $branch_id;
        $dto->priority = $priority;
        $dto->status = $status;

        return $dto;
    }

    public static function update($id, $user_id = null, $book_id = null, $edition_id = null, $branch_id = null, $priority = null, $status = null)
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
        if (!is_null($priority)) {
            $dto->priority = $priority;
        }
        if (!is_null($status)) {
            $dto->status = $status;
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
