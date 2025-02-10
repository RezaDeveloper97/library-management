<?php

namespace App\Queries;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = City::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return City::all();
    }

    public function getAllCitiesByProvinceId(int $provinceId): Collection
    {
        return City::query()->where('province_id', $provinceId)->get();
    }

    public function getAllCitiesByProvincesId(array $provincesId): Collection
    {
        return City::query()->whereIn('province_id', $provincesId)->get();
    }

    public function getCitiesByName(string $name, ?int $province_id = null): Collection
    {
        return City::query()
            ->when($province_id, fn ($query) => $query->where('province_id', $province_id))
            ->where('name', 'LIKE', "%{$name}%")
            ->orderBy('name')
            ->get();
    }
}
