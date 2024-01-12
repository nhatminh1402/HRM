<?php

namespace App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\EmployeeServices\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function showAllEmployee()
    {
        $employees = $this->employeeService->showallemployee();
        return view('admin.pages.employee_management.list_employee', compact('employees'));
    }

    public function getDetailEmployee($id)
    {
        $employee = $this->employeeService->getById($id);
        return view('admin.pages.employee_management.detail_employee', compact('employee'));
    }
    
    public function searchEmploy(Request $request)
    {
        $key = $request->get('key');
        $key = str_replace('%', '\%', $key);
        $employees = $this->employeeService->searchEmploy($key);
        return view('admin.pages.employee_management.list_employee', compact('employees'));
    }
}
