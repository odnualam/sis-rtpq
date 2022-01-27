<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Services\VillageService;

class VillageController extends Controller
{
    public function __invoke(VillageService $villageService, $districtCode)
    {
        return $villageService->getVillageByDistrictCode($districtCode);
    }
}
