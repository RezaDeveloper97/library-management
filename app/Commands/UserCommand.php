<?php

namespace App\Commands;

class UserCommand
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $is_vip;
    public $score;

    public static function create($name, $email, $password, $is_vip, $score)
    {
        $command = new self();
        $command->name = $name;
        $command->email = $email;
        $command->password = $password;
        $command->is_vip = $is_vip;
        $command->score = $score;

        return $command;
    }

    public static function update($id, $name = null, $email = null, $password = null, $is_vip = null, $score = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($name)) {
            $command->name = $name;
        }
        if (!is_null($email)) {
            $command->email = $email;
        }
        if (!is_null($password)) {
            $command->password = $password;
        }
        if (!is_null($is_vip)) {
            $command->is_vip = $is_vip;
        }
        if (!is_null($score)) {
            $command->score = $score;
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
