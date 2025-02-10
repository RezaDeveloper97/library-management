<?php

namespace App\Repositories;

use App\Queries\BranchQuery;
use Illuminate\Database\Eloquent\Collection;

class BranchRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new BranchQuery();
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }

    public function getBranchesByProvinceId(int $provinceId): Collection
    {
        $locationRepository = new LocationRepository();
        $cities = $locationRepository->getAllCitiesByProvinceId($provinceId);

        return $this->getBranchesByCitiesId($cities->pluck('id')->toArray());
    }

    public function getBranchesByProvincesId(array $provincesId): Collection
    {
        $locationRepository = new LocationRepository();
        $cities = $locationRepository->getAllCitiesByProvincesId($provincesId);

        return $this->getBranchesByCitiesId($cities->pluck('id')->toArray());
    }

    public function getBranchesByCityId(int $cityId): Collection
    {
        return $this->query->getBranchesByCityId($cityId);
    }

    public function getBranchesByCitiesId(array $citiesId): Collection
    {
        return $this->query->getBranchesByCitiesId($citiesId);
    }
}
