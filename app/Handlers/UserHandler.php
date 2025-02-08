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

    public function update(UserDTO $dto)
    {
        $model = User::query()->find($dto->id);

        if (!is_null($dto->name)) {
            $model->name = $dto->name;
        }
        if (!is_null($dto->email)) {
            $model->email = $dto->email;
        }
        if (!is_null($dto->password)) {
            $model->password = $dto->password;
        }
        if (!is_null($dto->is_vip)) {
            $model->is_vip = $dto->is_vip;
        }
        if (!is_null($dto->score)) {
            $model->score = $dto->score;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(UserDTO $dto)
    {
        $model = User::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
