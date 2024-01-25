<?php

namespace App\Console\Commands;

use App\Helpers;
use App\Models\Salary;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Salary\SalaryRepository;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Services\Employee\EmployeeService;
use App\Services\Salary\SalaryService;
use Carbon\Carbon;
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
            $timeSheetRepository = app()->make(TimesheetRepository::class);
            $employees = $employeeRepository->all();
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;

            foreach ($employees as $employee) {

                $prefix = 'ML';
                $basicSalary = $employee->basic_salary;
                $workDays = $timeSheetRepository->countWorkDayInMonth($employee->id, $month, $year);
                $totalSalary = ($basicSalary / 22) * $workDays;
                $timeNow = now()->format('Y-m-d H:i:s');

                $salary = Salary::updateOrCreate(
                    ['employee_id' => $employee->id],
                    [
                        'code_salary' => Helpers::generateCode($prefix),
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
