<?php

namespace App\Repositories;

use Laravolt\Indonesia\Models\Province;

class ProvinceRepository
{
    private $province;

    public function __construct()
    {
        $this->province = new Province();
    }

    public function getProvinceOrderByName()
    {
        return $this->province
            ->orderBy('name')
            ->get();
    }
}
