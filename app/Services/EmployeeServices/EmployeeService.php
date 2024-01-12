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

    public function showallemployee()
    {
        return $this->employeeRepository->showall();
    }

    public function getById($id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function searchEmploy($key)
    {
        return $this->employeeRepository->search($key);
    }
}
