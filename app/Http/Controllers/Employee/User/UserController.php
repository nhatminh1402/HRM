<?php

namespace App\Http\Controllers\Employee\User;

use App\Http\Controllers\Controller;
use App\Services\EmployeeServices\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function getEmployeeInfor()
    {
        $idUsers = Auth::guard('employee')->user()->id;
        $user = $this->employeeService->getById($idUsers);
        return view('user.pages.employee_Infor', compact('user'));
    }
}
