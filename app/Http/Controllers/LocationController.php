<?php

namespace App\Http\Controllers;

use App\Helpers\CacheHelper;
use App\Repositories\LocationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function listOfProvince(Request $request, LocationRepository $locationRepository): JsonResponse
    {
        $nameOfProvince = $request->input('q', null);

        $provinces = CacheHelper::cacheRemember(
            tags: ['provinces'],
            key: "province_{$nameOfProvince}",
            closure: function () use ($locationRepository, $nameOfProvince) {
                return !empty($nameOfProvince) ?
                    $locationRepository->getProvincesByName($nameOfProvince) :
                    $locationRepository->getProvinces();
            },
            ttl: 24 * 60 * 60
        );

        return $this->successJson($provinces->toArray());
    }

    public function listOfCity(Request $request, LocationRepository $locationRepository): JsonResponse
    {
        $nameOfCity = $request->input('q', null);
        $province_id = $request->input('province_id', null);

        if(is_null($province_id) && is_null($nameOfCity)) {
            return $this->errorMessage('error, which one, province_id or q', 400);
        }

        $cities = CacheHelper::cacheRemember(
            tags: ['cities'],
            key: "city_{$province_id}_{$nameOfCity}",
            closure: function () use ($locationRepository, $nameOfCity, $province_id) {
                return !empty($nameOfCity) ?
                    $locationRepository->getCitiesByName($nameOfCity, $province_id) :
                    $locationRepository->getAllCitiesByProvinceId($province_id);
            },
            ttl: 24 * 60 * 60
        );

        return $this->successJson($cities->toArray());
    }
}
