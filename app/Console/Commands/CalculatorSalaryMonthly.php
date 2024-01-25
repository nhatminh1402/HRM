<?php

namespace App\Console\Commands;

use App\Helpers;
use App\Models\Salary;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Salary\SalaryRepository;
use App\Services\Employee\EmployeeService;
use App\Services\Salary\SalaryService;
use Exception;
use Illuminate\Console\Command;

class CalculatorSalaryMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculator-salary-monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $employeeRepository = app()->make(EmployeeRepository::class);
            $employees = $employeeRepository->all();

            foreach ($employees as $employee) {
                $prefix = 'ML';
                $codeSalary = Helpers::generateCode($prefix);
                $basicSalary = $employee->basic_salary;
                $workDays = $employeeRepository->countWorkDayInMonth($employee->id);
                $totalSalary = ($basicSalary / 22) * $workDays;

                $salary = Salary::updateOrCreate(
                    ['employee_id' => $employee->id],
                    [
                        'code_salary' => $codeSalary,
                        'monthly_salary' => $totalSalary,
                        'workday' => $workDays,
                        'real_leaders' => $totalSalary,
                    ]
                );
                
                $salary->whereMonth('created_at', '=', now()->month)
                    ->whereYear('created_at', '=', now()->year)
                    ->first();
            }
        } catch (Exception $e) {
            logger($e->getMessage());
        }
    }

}
