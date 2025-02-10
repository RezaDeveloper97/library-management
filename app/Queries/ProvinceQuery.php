<?php

namespace App\Queries;

use App\Models\Province;
use Illuminate\Database\Eloquent\Collection;

class ProvinceQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Province::query()->find($id);

        return $this->getModelData($model);
    }

    public function getProvinces(): Collection
    {
        return Province::all();
    }

    public function getProvincesByName(string $name): Collection
    {
        return Province::query()
            ->where('name', 'LIKE', "%{$name}%")
            ->orderBy('name')
            ->get();
    }
}
