<?php

namespace App\Services\EmployeeServices;

use App\Repositories\EmployeeRepository\EmployeeRepository;

class EmployeeService
{

    protected $employeeRepository;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function showallusers()
    {
        return $this->employeeRepository->showall();
    }
}
