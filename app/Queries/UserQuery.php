<?php

namespace App\Queries;

use App\Models\User;

class UserQuery extends BasicQuery
{
    public function findById($id): ?User
    {
        $model = User::query()->find($id);

        return $this->getModelData($model);
    }

    public function findByEmail(string $email)
    {
        $model = User::query()->where('email', $email)->first();

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return User::all();
    }
}
