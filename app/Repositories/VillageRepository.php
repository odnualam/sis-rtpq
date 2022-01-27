<?php

namespace App\Repositories;

use Laravolt\Indonesia\Models\Village;

class VillageRepository
{
    public function getAllVillages(Village $village)
    {
        return $village->get();
    }

    public function getVillageByDistrictCode(Village $village, $districtCode)
    {
        return $village->where('district_code', $districtCode)->get();
    }
}
