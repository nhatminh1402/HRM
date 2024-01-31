<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Services\Project\ProjectService;

class StatisticsController extends Controller
{

    private $employeeService;
    private $projectService;

    public function __construct(EmployeeService $employeeService, ProjectService $projectService)
    {
        $this->employeeService = $employeeService;
        $this->projectService = $projectService;
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

    public function countEmployeeInEachProject()
    {
        return $this->projectService->countEmployeeInEachProject();
    }
}