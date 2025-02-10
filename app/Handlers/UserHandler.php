<?php

namespace App\Handlers;

use App\Models\User;
use App\DTOs\UserDTO;

class UserHandler extends BasicHandler
{
    public function create(UserDTO $dto)
    {
        $model = User::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
            'is_vip' => $dto->is_vip,
            'score' => $dto->score
        ]);

        $model->setCacheData();

        return $model;
    }

    public function updateScore(int $userId, int $score)
    {
        $model = User::query()->find($userId);
        if ($model) {
            $model->score += $score;

            $model->save();

            $model->setCacheData();
        }

        return $model;
    }
}
