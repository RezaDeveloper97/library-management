<?php

namespace App\Commands;

class AuthorCommand
{
    public $id;
    public $name;

    public static function create($name)
    {
        $command = new self();
        $command->name = $name;

        return $command;
    }

    public static function update($id, $name = null)
    {
        $command = new self();
        $command->id = $id;
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
