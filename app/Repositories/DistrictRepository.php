<?php

namespace App\Repositories;

use Laravolt\Indonesia\Models\District;

class DistrictRepository
{
    public function getAllDistrict(District $district) {
        return $district->get();
    }

    public function getDistrictByCityCode(District $district, $cityCode) {
        return $district->where('city_code', $cityCode)->get();
    }
}
