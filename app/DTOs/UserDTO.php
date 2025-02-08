<?php

namespace App\DTOs;

class UserDTO extends BasicDTO
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $is_vip;
    public $score;

    public static function create($name, $email, $password, $is_vip, $score)
    {
        $dto = new self();
        $dto->name = $name;
        $dto->email = $email;
        $dto->password = $password;
        $dto->is_vip = $is_vip;
        $dto->score = $score;

        return $dto;
    }

    public static function update($id, $name = null, $email = null, $password = null, $is_vip = null, $score = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($name)) {
            $dto->name = $name;
        }
        if (!is_null($email)) {
            $dto->email = $email;
        }
        if (!is_null($password)) {
            $dto->password = $password;
        }
        if (!is_null($is_vip)) {
            $dto->is_vip = $is_vip;
        }
        if (!is_null($score)) {
            $dto->score = $score;
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
