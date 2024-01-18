<?php

namespace App\Services\Project;

use App\Helpers;
use App\Models\Employee;
use App\Models\Project;
use App\Repositories\Project\ProjectRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectService.
 */
class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAll()
    {
        return $this->projectRepository->getAll();
    }

    public function getProjectCode($prefix)
    {
        $projectCode = Helpers::generateCode($prefix);

        return $projectCode;
    }

    public function getAllEmployees()
    {
        return $this->projectRepository->getAllEmployees();
    }

    public function createProject(array $data)
    {
        $dataHtml = Helpers::stripHtmlTags($data);

        $prefix = 'MDA';

        if ($dataHtml) {
            $dataHtml['code_project'] = $this->getProjectCode($prefix);
        }

        $project = Project::create($dataHtml);

        $employeeIds = $data['selected_employees'];
        
        $employees = Employee::whereIn('id', $employeeIds)->get();

        $project->employees()->attach($employees);

        return $project;
    }
}
