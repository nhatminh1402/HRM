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

    public function showAllUser()
    {
      
        $users = Employee::paginate(10);
        
        return view('admin.pages.employee_management.list_employee', compact('users'));
     
    }
}

