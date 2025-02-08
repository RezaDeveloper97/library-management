<?php

namespace App\DTOs;

class CityDTO extends BasicDTO
{
    public $id;
    public $province_id;
    public $name;

    public static function create($province_id, $name)
    {
        $dto = new self();
        $dto->province_id = $province_id;
        $dto->name = $name;

        return $dto;
    }

    public static function update($id, $province_id = null, $name = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($province_id)) {
            $dto->province_id = $province_id;
        }
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
