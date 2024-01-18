<?php

namespace App\Http\Controllers\Employee;

use App\Enums\DegreesEnum;
use App\Http\Controllers\Controller;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use App\Services\Location\ProvinceService;
use App\Services\Position\PositionService;
use Illuminate\Http\Request;

class UpdateEmployeeController extends Controller
{
    protected $employeeService;
    private $provinceService;
    private $positionService;
    private $departmentService;

    public function __construct(EmployeeService $employeeService, ProvinceService $provinceService, PositionService $positionService, DepartmentService $departmentService)
    {
        $this->employeeService = $employeeService;
        $this->provinceService = $provinceService;
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
    }

    public function showViewUpdate($id)
    {
        $employee = $this->employeeService->getById($id);
        // get a list degree from enum
        $listDegree = DegreesEnum::asArray();
        //get a list positions
        $listPositons = $this->positionService->all(['id', 'name']);
        //get a list department
        $listDepartments = $this->departmentService->all(['id', 'name']);
        //get location of employee

        $listProvince = $this->provinceService->all(['id', 'name']);
        return view('admin.pages.employee_management.update_infor', compact('employee', 'listProvince', 'listDegree', 'listPositons', 'listDepartments'));
    }

    public function update(UpdateEmployeeController $request, $id)
    {
        $this->employeeService->update($request->all(), $id);
    }
}
