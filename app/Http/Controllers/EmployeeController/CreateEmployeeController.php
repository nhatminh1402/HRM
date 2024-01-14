<?php

namespace App\Http\Controllers\EmployeeController;

use App\Enums\DegreesEnum;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Services\Location\ProvinceService;
use App\Services\PositionService;
use Illuminate\Http\Request;

class CreateEmployeeController extends Controller
{

    private $provinceService;
    private $positionService;

    public function __construct(ProvinceService $provinceService, PositionService $positionService)
    {
        $this->provinceService = $provinceService;
        $this->positionService = $positionService;
    }
    /**
     * Show form tạo nhân viên
     */
    public function create()
    {
        // genarate employee code
        $employeeId = Helpers::generateEmployeeCode("MNV");
        // get a list degree from enum
        $listDegree = DegreesEnum::asArray();
        //get a list positions
        $listPositons = $this->positionService->all(["id", "name"]);

        $listProvince = $this->provinceService->all(["id", "name"]);
        return view("admin.pages.employee_management.add_employee", compact("employeeId", "listProvince", "listDegree", "listPositons"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
