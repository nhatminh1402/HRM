<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Location\ProvinceService;
use App\Services\Location\WardService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $provinceService;
    private $wardService;

    public function __construct(ProvinceService $provinceService, WardService $wardService)
    {
        $this->provinceService = $provinceService;
        $this->wardService = $wardService;
    }

    public function getDistrictsByProvinceId(Request $request)
    {
        $province_id = $request->get("province_id");
        return $this->provinceService->getDistrictsByProvinceId($province_id);
    }

    public function getWardsByDistrcitId(Request $request)
    {
        $district_id = $request->get("district_id");
        return $this->wardService->getWardsByDistrcitId($district_id);
    }
}
