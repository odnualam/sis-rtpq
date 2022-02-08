<?php

namespace App\Services;

use App\Repositories\VillageRepository;
use Laravolt\Indonesia\Models\Village;

class VillageService
{
    private $villageRepository;

    public function __construct()
    {
        $this->villageRepository = new VillageRepository();
    }

    public function getAllVillage()
    {
        return $this->villageRepository->getAllVillages(new Village());
    }

    public function getVillageByDistrictCode($districtCode)
    {
        return $this->villageRepository->getVillageByDistrictCode(new Village(), $districtCode);
    }
}
