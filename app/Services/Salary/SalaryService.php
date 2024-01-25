<?php

namespace App\Services\Salary;

use App\Helpers;
use App\Models\Salary;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Salary\SalaryRepository;
use Carbon\Carbon;

/**
 * Class SalaryService.
 */
class SalaryService
{
    protected $salaryRepository;
    protected $employeeRepository;

    public function __construct(SalaryRepository $salaryRepository, EmployeeRepository $employeeRepository)
    {
        $this->salaryRepository = $salaryRepository;

        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployee()
    {
        return $this->employeeRepository->all();
    }

    public function getAll()
    {
        return $this->salaryRepository->all();
    }

    public function getSalaryCode($prefix)
    {
        $salaryCode = Helpers::generateCode($prefix);
        return $salaryCode;
    }

    public function create(array $data, $employeeId)
    {
        $dataHtml = Helpers::stripHtmlTags($data);
        $prefix = 'ML';

        if ($dataHtml) {
            $dataHtml['code_salary'] = $this->getSalaryCode($prefix);
        }

        $employeeId = $dataHtml['selected_employees'] ?? '';
        $basicSalary = $this->employeeRepository->getBasicSalary($employeeId);
        $workDays = $this->employeeRepository->countWorkDayInMonth($employeeId);

        $totalSalary = ($basicSalary / 22) * $workDays;

        $salary = Salary::updateOrCreate(
            ['employee_id' => $employeeId],
            [
                'code_salary' => $dataHtml['code_salary'],
                'monthly_salary' => $totalSalary,
                'workday' => $workDays,
                'real_leaders' => $totalSalary,
            ]
        );

        $salary->whereMonth('created_at', '=', now()->month)
            ->whereYear('created_at', '=', now()->year)
            ->first();
        return $salary;
    }


    public function getNamePosition()
    {
        return $this->salaryRepository->getNamePosition();
    }

    public function getMonthSalaries()
    {
        return $this->salaryRepository->getMonthSalaries();
    }

    public function searchSalary($key) {
        return $this->salaryRepository->search($key);
    }
}
