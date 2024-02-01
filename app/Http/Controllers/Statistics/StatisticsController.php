<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Http\Requests\YearRequest;
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

    public function countEmployeeChangesByMonth(YearRequest $request)
    {
        $year = $request->input("year");

        return $this->employeeService->countEmployeeChangesByMonth($year);
    }

    public function countEmployeeInEachDepartment()
    {
        return $this->employeeService->countEmployeeInEachDepartment();
    }

    public function countEmployeeInEachProject(YearRequest $request)
    {
        $year = $request->input("year");

        return $this->projectService->countEmployeeInEachProject($year);
    }
}