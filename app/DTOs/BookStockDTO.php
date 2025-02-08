<?php

namespace App\DTOs;

class BookStockDTO extends BasicDTO
{
    public $id;
    public $book_id;
    public $edition_id;
    public $branch_id;
    public $total_copies;
    public $reserved_copies;

    public static function create($book_id, $edition_id, $branch_id, $total_copies, $reserved_copies)
    {
        $dto = new self();
        $dto->book_id = $book_id;
        $dto->edition_id = $edition_id;
        $dto->branch_id = $branch_id;
        $dto->total_copies = $total_copies;
        $dto->reserved_copies = $reserved_copies;

        return $dto;
    }

    public static function update($id, $book_id = null, $edition_id = null, $branch_id = null, $total_copies = null, $reserved_copies = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($book_id)) {
            $dto->book_id = $book_id;
        }
        if (!is_null($edition_id)) {
            $dto->edition_id = $edition_id;
        }
        if (!is_null($branch_id)) {
            $dto->branch_id = $branch_id;
        }
        if (!is_null($total_copies)) {
            $dto->total_copies = $total_copies;
        }
        if (!is_null($reserved_copies)) {
            $dto->reserved_copies = $reserved_copies;
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
