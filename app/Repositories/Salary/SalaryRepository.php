<?php

namespace App\Repositories\Salary;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SalaryRepository.
 *
 * @package namespace App\Repositories\Salary;
 */
interface SalaryRepository extends RepositoryInterface
{
    public function getNamePosition();
    public function getMonthSalary();
}
