<?php

namespace App\Queries;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

class BranchQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Branch::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return Branch::all();
    }

    public function getBranchesByCityId(int $cityId): Collection
    {
        return Branch::query()->where('city_id', $cityId)->get();
    }

    public function getBranchesByCitiesId(array $citiesId): Collection
    {
        return Branch::query()->whereIn('city_id', $citiesId)->get();
    }
}
