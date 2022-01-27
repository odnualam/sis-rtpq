<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Services\DistrictService;

class DistrictController extends Controller
{
    public function __invoke(DistrictService  $districtService, $districtCode)
    {
        return $districtService->getAllDistrictByCityCode($districtCode);
    }
}
