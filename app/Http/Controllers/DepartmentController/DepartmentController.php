<?php

namespace App\Http\Controllers\DepartmentController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDepartmentRequest;
use App\Services\DepartmentServices\DepartmentService;
use App\Services\EmployeeServices\EmployeeService;


class DepartmentController extends Controller
{
    protected $departmentService;
    protected $employeeeService;
    public function __construct(DepartmentService $departmentService, EmployeeService $employeeeService)
    {
        $this->departmentService = $departmentService;
        $this->employeeeService = $employeeeService;
    }

    public function showallBlockDeparment()
    {
        $departments = $this->departmentService->getAllDeparment();
        return view("admin.pages.department.show-department", compact("departments"));
    }

    public function showallDeparment()
    {
        $departments = $this->departmentService->getAllDeparment();
        return view("admin.pages.department.add-department", compact("departments"));
    }

    public function addDepartment(CreateDepartmentRequest $request)
    {
        $this->departmentService->createDepartment($request->all());
        return redirect()->route('admin.department.show')->with("success", "Create position success!");

    }

    public function getDetailDepartment($id)
    {
        try {
            $department = $this->departmentService->getDetailDepartment($id);
            $employees = $this->departmentService->getEmployees($id);
            $employeesHaveDeparmentNull = $this->employeeeService->getEmployeeDepartmentNull();
            return view('admin.pages.department.manage-department', compact('department', 'employees','employeesHaveDeparmentNull'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'không tìm thấy phòng bang ');
        }
    }

    public function updateDepartment(CreateDepartmentRequest $request, $id)
    {
        try {
            $updateDepartment = $this->departmentService->updateDepartment($request->all(), $id);
            return redirect()->route('admin.department.add')->with('success', 'Cập nhật chức vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.department.add')
                ->with('error', 'Lỗi khi cập nhật phòng ban: ' . $e->getMessage());
        }
    }

    public function destroyDepartment($id)
    {
        try {
            $updateDepartment = $this->departmentService->deleteDepartment($id);
            return redirect()->back()->with('success', 'Xóa  phòng ban thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Lỗi xóa phòng ban: ' . $e->getMessage());
        }
    }

}
