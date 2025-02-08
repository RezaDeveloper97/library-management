<?php

namespace App\DTOs;

class PublisherDTO extends BasicDTO
{
    public $id;
    public $name;

    public static function create($name)
    {
        $dto = new self();
        $dto->name = $name;

        return $dto;
    }

    public static function update($id, $name = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($name)) {
            $dto->name = $name;
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
