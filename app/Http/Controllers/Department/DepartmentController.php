<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDepartmentRequest;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;


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
        $employeesHaveDeparmentNull = $this->employeeeService->getEmployeeDepartmentNull();
        return view("admin.pages.department.add-department", compact('departments', 'employeesHaveDeparmentNull'));
    }

    public function addDepartment(CreateDepartmentRequest $request)
    {
        $department = $this->departmentService->createDepartment($request->all());
        $employee_id = $request->id_employee;
        if (!empty($employee_id)) {
            $this->employeeeService->setDepartmentId($employee_id, $department->id);
        }
        return redirect()->back()->with("success", "Tạo phòng ban thành công!");
    }

    public function getDetailDepartment($id)
    {
        try {
            $department = $this->departmentService->getDetailDepartment($id);
            $employees = $this->departmentService->getEmployees($id);
            $employeesHaveDeparmentNull = $this->employeeeService->getEmployeeDepartmentNull();
            return view('admin.pages.department.manage-department', compact('department', 'employees', 'employeesHaveDeparmentNull'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'không tìm thấy phòng bang ');
        }
    }

    public function updateDepartment(CreateDepartmentRequest $request, $id)
    {
        try {
            $data['name'] = $request->name;
            $data['description'] = $request->description;

            $employees_id= $request->id_employee;
            if (!empty($employees_id)) {
                foreach ($employees_id as $employee_id) {
                    $this->employeeeService->setDepartmentId($employee_id, $id);
                }
            }
            $this->departmentService->updateDepartment($data, $id);
            return redirect()->back()->with('success', 'Cập nhật phòng ban thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.department.add')
                ->with('error', 'Lỗi khi cập nhật phòng ban: ' . $e->getMessage());
        }
    }

    public function destroyDepartment($id)
    {
        try {
            $this->departmentService->deleteDepartment($id);
            return redirect()->back()->with('success', 'Xóa  phòng ban thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Lỗi xóa phòng ban: ' . $e->getMessage());
        }
    }

    public function destroyEmployeeDepartment($id)
    {
        try {
            $this->employeeeService->setDepartmentId($id, null);
            return redirect()->back()->with('success', 'Xóa nhân viên khỏi phòng ban thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.department.add')
                ->with('error', 'Lỗi khi cập nhật phòng ban: ' . $e->getMessage());
        }
    }
}
