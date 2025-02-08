<?php

namespace App\DTOs;

class BranchDTO extends BasicDTO
{
    public $id;
    public $city_id;
    public $name;
    public $address;
    public $postal_code;
    public $latitude;
    public $longitude;

    public static function create($city_id, $name, $address, $postal_code, $latitude, $longitude)
    {
        $dto = new self();
        $dto->city_id = $city_id;
        $dto->name = $name;
        $dto->address = $address;
        $dto->postal_code = $postal_code;
        $dto->latitude = $latitude;
        $dto->longitude = $longitude;

        return $dto;
    }

    public static function update($id, $city_id = null, $name = null, $address = null, $postal_code = null, $latitude = null, $longitude = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($city_id)) {
            $dto->city_id = $city_id;
        }
        if (!is_null($name)) {
            $dto->name = $name;
        }
        if (!is_null($address)) {
            $dto->address = $address;
        }
        if (!is_null($postal_code)) {
            $dto->postal_code = $postal_code;
        }
        if (!is_null($latitude)) {
            $dto->latitude = $latitude;
        }
        if (!is_null($longitude)) {
            $dto->longitude = $longitude;
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
