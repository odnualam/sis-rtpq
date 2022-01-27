<?php

namespace App\Services;

use App\Repositories\ProvinceRepository;

class ProvinceService
{
    private $provinceRepository;

    public function __construct()
    {
        $this->provinceRepository = new ProvinceRepository();
    }

    public function getProvinceOrderByName(){
        return $this->provinceRepository->getProvinceOrderByName();
    }
}
