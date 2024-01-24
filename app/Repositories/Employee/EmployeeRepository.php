<?php

namespace App\Repositories\Employee;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EmployeeRepository.
 *
 * @package namespace App\Repositories\EmployeeRepository;
 */
interface EmployeeRepository extends RepositoryInterface
{
    public function showall();
    public function getById($id);
    public function search($key);
    public function create(array $attributes);
    public function getEmployeDepartmentNull();
    public function all($columns = ['*']);
    public function countWorkDayInMonth($employeeId);
    public function getBasicSalary($employeeId);
}
