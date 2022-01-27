<?php

namespace App\Services;

use App\Repositories\DistrictRepository;
use Laravolt\Indonesia\Models\District;

class DistrictService
{
    private $districtRepository;

    public function __construct()
    {
        $this->districtRepository = new DistrictRepository();
    }

    public function getAllDistrict()
    {
        return $this->districtRepository->getAllDistrict(new District());
    }

    public function getAllDistrictByCityCode($cityCode)
    {
        return $this->districtRepository->getDistrictByCityCode(new District(), $cityCode);
    }
}
