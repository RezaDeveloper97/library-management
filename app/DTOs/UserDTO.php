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
}
