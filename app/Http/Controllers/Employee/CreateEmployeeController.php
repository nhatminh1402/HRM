<?php

namespace App\Http\Controllers\Employee;

use App\Enums\DegreesEnum;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateEmployeeRequest;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use App\Services\Location\ProvinceService;
use App\Services\Position\PositionService;
use App\Traits\ImgProcess;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateEmployeeController extends Controller
{
    use ImgProcess;

    private $provinceService;
    private $positionService;
    private $departmentService;
    private $employeeService;

    public function __construct(ProvinceService $provinceService, PositionService $positionService, DepartmentService $departmentService, EmployeeService $employeeService)
    {
        $this->provinceService = $provinceService;
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
        $this->employeeService = $employeeService;
    }
    /**
     * Show form tạo nhân viên
     */
    public function create()
    {
        // genarate employee code
        $employeeId = Helpers::generateCode('MNV');
        // get a list degree from enum
        $listDegree = DegreesEnum::asArray();
        //get a list positions
        $listPositons = $this->positionService->all(['id', 'name']);
        //get a list department
        $listDepartments = $this->departmentService->all(['id', 'name']);

        $listProvince = $this->provinceService->all(['id', 'name']);
        return view('admin.pages.employee_management.add_employee', compact('employeeId', 'listProvince', 'listDegree', 'listPositons', 'listDepartments'));
    }

    public function store(CreateEmployeeRequest $request)
    {
        $file_upload = $request->image_file;
        //rename file
        $file_name = $this->renameIMG($file_upload);
        $dataEmployee = array_merge($request->all(), ["image" => $file_name]);
        //store in local server
        $this->saveImage($file_upload, "uploads", $file_name);
        // insert employee infor to db
        $employee = $this->employeeService->create($dataEmployee);
        return response()->json($employee, Response::HTTP_CREATED);
    }
}
