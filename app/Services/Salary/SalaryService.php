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
        $employeeId = $data['selected_employees'] ?? '';
        $basicSalary = $this->employeeRepository->getBasicSalary($employeeId);
        $workDays = $this->employeeRepository->countWorkDayInMonth($employeeId);

        $totalSalary = ($basicSalary / 22) * $workDays;

        $salary = new Salary();
        $salary->code_salary = $dataHtml['code_salary'];
        $salary->monthly_salary = $totalSalary;
        $salary->workday = $workDays;
        $salary->real_leaders = 0;
        $salary->employee_id = $employeeId;

        $salary->save();

        return $salary;
    }

    public function getNamePosition()
    {
        return $this->salaryRepository->getNamePosition();
    }
}
