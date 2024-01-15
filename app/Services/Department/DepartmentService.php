<?php

namespace App\Services\Department;

use App\Repositories\Department\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function all($columns = ['*'])
    {
        return $this->departmentRepository->all($columns);
    }
}
