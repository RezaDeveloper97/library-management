<?php

namespace App\Repositories;

use App\Queries\ProvinceQuery;
use App\Queries\CityQuery;
use Illuminate\Database\Eloquent\Collection;

class LocationRepository extends BasicRepository
{
    protected ProvinceQuery $provinceQuery;
    protected CityQuery $cityQuery;

    public function __construct()
    {
        $this->provinceQuery = new ProvinceQuery();
        $this->cityQuery = new CityQuery();
    }

    public function getProvinces(): Collection
    {
        return $this->provinceQuery->getProvinces();
    }

    public function getProvincesByName(string $name): Collection
    {
        return $this->provinceQuery->getProvincesByName($name);
    }

    public function getAllCitiesByProvinceId(int $provinceId): Collection
    {
        return $this->cityQuery->getAllCitiesByProvinceId($provinceId);
    }

    public function getAllCitiesByProvincesId(array $provincesId): Collection
    {
        return $this->cityQuery->getAllCitiesByProvincesId($provincesId);
    }

    public function getCitiesByName(string $name, ?int $province_id = null): Collection
    {
        return $this->cityQuery->getCitiesByName($name, $province_id);
    }
}
