<?php

namespace App\Services;

use App\Repositories\CityRepository;
use Laravolt\Indonesia\Models\City;

class CityService
{
    private $cityRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
    }

    public function getCity()
    {
        return $this->cityRepository->getAll(new City());
    }

    public function getCityByProvinceCode($provinceCode)
    {
        return $this->cityRepository->getCityByProvinceCode($provinceCode, new City());
    }
}
