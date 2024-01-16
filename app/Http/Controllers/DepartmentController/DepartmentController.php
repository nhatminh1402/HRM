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
            $employee_id = $request->id_employee;
            if (!empty($employee_id)) {
                $this->employeeeService->setDepartment_id($employee_id, $id);
            }
            $this->departmentService->updateDepartment($data, $id);
            return redirect()->route('admin.department.add')->with('success', 'Cập nhật phòng ban thành công!');
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
            $this->employeeeService->setDepartment_id($id, null);
            return redirect()->back()->with('success', 'Xóa nhân viên khỏi phòng ban thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.department.add')
                ->with('error', 'Lỗi khi cập nhật phòng ban: ' . $e->getMessage());
        }
    }
}
