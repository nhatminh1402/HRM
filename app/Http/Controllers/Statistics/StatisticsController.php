<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function countEmployeeChangesByMonth()
    {
        $year = request()->input("year");

        return $this->employeeService->countEmployeeChangesByMonth($year);
    }

    public function countEmployeeInEachDepartment()
    {
        return $this->employeeService->countEmployeeInEachDepartment();
    }
}