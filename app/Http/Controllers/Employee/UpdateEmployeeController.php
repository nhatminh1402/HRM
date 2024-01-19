<?php

namespace App\Http\Controllers\Employee;

use App\Enums\DegreesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use App\Services\Location\ProvinceService;
use App\Services\Position\PositionService;
use App\Traits\ImgProcess;
use Illuminate\Http\Client\Events\ResponseReceived;
use Response;

class UpdateEmployeeController extends Controller
{
    use ImgProcess;
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

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $dataEmployee = $request->all();

        if ($request->hasFile('image_file')) {
            $file_upload = $request->image_file;
            //rename file
            $file_name = $this->renameIMG($file_upload);
            $dataEmployee = array_merge($request->all(), ["image" => $file_name]);
            //store in local server
            $this->saveImage($file_upload, "uploads", $file_name);
            //delete current file
            $employee = $this->employeeService->getById($id);
            $imgOldName = $employee->image;
            $this->deleteImage('uploads', $imgOldName);
        }

        // update employee infor to db
        $this->employeeService->update($dataEmployee, $id);
        return response()->json(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
