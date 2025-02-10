<?php

namespace App\Services;

use App\Handlers\UserHandler;
use App\DTOs\UserDTO;

class UserService extends BasicService
{
    protected UserHandler $userHandler;

    public function __construct()
    {
        $this->userHandler = new UserHandler();
    }

    public function create(string $name, string $email, string $password)
    {
        $userDto = new UserDTO();
        $userDto->name = $name;
        $userDto->email = $email;
        $userDto->password = $password;
        $userDto->is_vip = false;
        $userDto->score = 0;

        return $this->userHandler->create($userDto);
    }

    public function updateUserScore(int $userId, int $score)
    {
        return $this->userHandler->updateScore($userId, $score);
    }
}
