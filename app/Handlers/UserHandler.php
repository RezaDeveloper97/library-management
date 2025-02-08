<?php

namespace App\Handlers;

use App\Commands\UserCommand;
use App\Models\User;

class UserHandler
{
    public function create(UserCommand $command)
    {
        return User::create([
            'name' => $command->name,
            'email' => $command->email,
            'password' => $command->password,
            'is_vip' => $command->is_vip,
            'score' => $command->score
        ]);
    }

    public function update(UserCommand $command)
    {
        $model = User::findOrFail($command->id);

        if (!is_null($command->name)) {
            $model->name = $command->name;
        }
        if (!is_null($command->email)) {
            $model->email = $command->email;
        }
        if (!is_null($command->password)) {
            $model->password = $command->password;
        }
        if (!is_null($command->is_vip)) {
            $model->is_vip = $command->is_vip;
        }
        if (!is_null($command->score)) {
            $model->score = $command->score;
        }

        $model->save();

        return $model;
    }

    public function delete(UserCommand $command)
    {
        $model = User::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
