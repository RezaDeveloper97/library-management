<?php

namespace App\Commands;

class CityCommand
{
    public $id;
    public $province_id;
    public $name;

    public static function create($province_id, $name)
    {
        $command = new self();
        $command->province_id = $province_id;
        $command->name = $name;

        return $command;
    }

    public static function update($id, $province_id = null, $name = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($province_id)) {
            $command->province_id = $province_id;
        }
        if (!is_null($name)) {
            $command->name = $name;
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
