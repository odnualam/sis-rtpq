<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Services\CityService;

class CityController extends Controller
{
    public function __invoke(CityService $cityService, $province_code)
    {
        return $cityService->getCityByProvinceCode($province_code);
    }
}
