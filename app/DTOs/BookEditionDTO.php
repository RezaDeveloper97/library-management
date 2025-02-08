<?php

namespace App\DTOs;

class BookEditionDTO extends BasicDTO
{
    public $id;
    public $book_id;
    public $publisher_id;
    public $edition_year;

    public static function create($book_id, $publisher_id, $edition_year)
    {
        $dto = new self();
        $dto->book_id = $book_id;
        $dto->publisher_id = $publisher_id;
        $dto->edition_year = $edition_year;

        return $dto;
    }

    public static function update($id, $book_id = null, $publisher_id = null, $edition_year = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($book_id)) {
            $dto->book_id = $book_id;
        }
        if (!is_null($publisher_id)) {
            $dto->publisher_id = $publisher_id;
        }
        if (!is_null($edition_year)) {
            $dto->edition_year = $edition_year;
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
