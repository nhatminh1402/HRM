<?php

namespace App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Controller;
use App\Services\EmployeeServices\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    

    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function showAllUser()
    {
        $employees = $this->employeeService->showallusers();
   

        return view('admin.pages.employee_management.list_employee', compact('employees'));
    }
}

