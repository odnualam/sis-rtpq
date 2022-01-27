<?php

namespace App\Repositories;

use Laravolt\Indonesia\Models\City;

class CityRepository
{
    public function getAll(City $city)
    {
        return $city->get();
    }

    public function getCityByProvinceCode($provinceCode, City $city)
    {
        return $city->where('province_code', $provinceCode)->get();
    }
}
