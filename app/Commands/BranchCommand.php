<?php

namespace App\Commands;

class BranchCommand
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
        $command = new self();
        $command->city_id = $city_id;
        $command->name = $name;
        $command->address = $address;
        $command->postal_code = $postal_code;
        $command->latitude = $latitude;
        $command->longitude = $longitude;

        return $command;
    }

    public static function update($id, $city_id = null, $name = null, $address = null, $postal_code = null, $latitude = null, $longitude = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($city_id)) {
            $command->city_id = $city_id;
        }
        if (!is_null($name)) {
            $command->name = $name;
        }
        if (!is_null($address)) {
            $command->address = $address;
        }
        if (!is_null($postal_code)) {
            $command->postal_code = $postal_code;
        }
        if (!is_null($latitude)) {
            $command->latitude = $latitude;
        }
        if (!is_null($longitude)) {
            $command->longitude = $longitude;
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
