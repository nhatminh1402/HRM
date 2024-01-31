<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDepartmentRequest;
use App\Models\Department;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    protected $employeeeService;
    public function __construct(DepartmentService $departmentService, EmployeeService $employeeeService)
    {
        $this->departmentService = $departmentService;
        $this->employeeeService = $employeeeService;
    }


    public function showallDeparment(Request $request)
    {
        $departments = $this->departmentService->getAllDeparment();
        $employeesHaveDeparmentNull = $this->employeeeService->getEmployeeDepartmentNull();

        if ($request->input('key')) {
            $departments = $this->departmentService->searchDepartment($request->input('key'));
        }
        $pageNumber = $request->query('page');
        return view("admin.pages.department.add-department", compact('departments', 'employeesHaveDeparmentNull', 'pageNumber'));
    }

    public function addDepartment(CreateDepartmentRequest $request)
    {
        $department = $this->departmentService->createDepartment($request->all());
        $employees_id = $request->id_employee;
        if (!empty($employees_id)) {
            foreach ($employees_id as $employee_id) {
                $this->employeeeService->setDepartmentId($employee_id, $department->id);
            }
        }
    }

    public function getEmployeeDepartment($id, Request $request)
    {
        $department = $this->departmentService->getDetailDepartment($id);
        $employees = $this->departmentService->getEmployees($id);

        if ($request->input('key')) {
            $employees = $this->employeeeService->searchEmploy($request->input('key'));
            $employees->where('id_department', $id);
        }

        $employeesHaveDeparmentNull = $this->employeeeService->getEmployeeDepartmentNull();
        $pageNumber = $request->query('page');
        return view('admin.pages.department.manage-department', compact('department', 'employees', 'employeesHaveDeparmentNull'));

    }

    public function getDetailDepartment($id)
    {
        try {
            $department = $this->departmentService->getDetailDepartment($id);
            return $department;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'không tìm thấy phòng bang ');
        }
    }

    public function updateDepartment(CreateDepartmentRequest $request, $id)
    {
        try {
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $this->departmentService->updateDepartment($data, $id);
            return response()->json(['success' => 'Cập nhật phòng ban thành công!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi cập nhật']);
        }
    }

    public function addEmployeeDepartment($id)
    {
        try {
            $employees_id = request()->id_employee;
            if (!empty($employees_id)) {
                foreach ($employees_id as $employee_id) {
                    $this->employeeeService->setDepartmentId($employee_id, $id);
                }
            }
            return response()->json(['success' => 'Cập nhật nhân viên phòng ban thành công!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi cập nhật']);
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
