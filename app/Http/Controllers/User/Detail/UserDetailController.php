<?php

namespace App\Http\Controllers\User\Detail;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Services\Useruploadimage\UserUploadImgService;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    protected $employeeService;
    protected $userService;
    public function __construct(EmployeeService $employeeService, UserUploadImgService $userService)
    {
        $this->employeeService = $employeeService;
        $this->userService = $userService;
    }
    public function getEmployeeInfor()
    {
        $idUser = $this->userService->getIdUser();
        $user = $this->employeeService->getById($idUser);
        $userSalary = $user->salary;
        return view('user.pages.employee_Infor', compact('user', 'userSalary'));
    }

    public function getsalaryEmployee()
    {
        $idUser = $this->userService->getIdUser();
        $user = $this->employeeService->getById($idUser);
        $userSalary = $user->salary;
        return view('user.pages.manage_salary', compact('userSalary'));
    }
}
