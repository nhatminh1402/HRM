<?php

namespace App\Services\Location;

use App\Repositories\Location\Province\ProvinceRepository;

class ProvinceService
{
    private $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function all($columns = ['*'])
    {
        return $this->provinceRepository->all($columns);
    }

    public function getDistrictsByProvinceId($province_id)
    {
        return $this->provinceRepository->getDistrictsByProvinceId($province_id);
    }
}
