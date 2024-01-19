<?php

namespace App\Services\Project;

use App\Helpers;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Project\ProjectRepository;

/**
 * Class ProjectService.
 */
class ProjectService
{
    protected $projectRepository;
    protected $employeeRepository;

    public function __construct(ProjectRepository $projectRepository, EmployeeRepository $employeeRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->employeeRepository = $employeeRepository;
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

    public function getAllEmployee()
    {
        return $this->employeeRepository->all();
    }

    public function createProject(array $data)
    {
        $dataHtml = Helpers::stripHtmlTags($data);
        $prefix = 'MDA';

        if ($dataHtml) {
            $dataHtml['code_project'] = $this->getProjectCode($prefix);
        }

        $project = $this->projectRepository->create($dataHtml);
        $employeeIds = $data['selected_employees'] ?? [];
        $project->addEmployee($employeeIds);
        return $project;
    }

    public function edit($id)
    {
        return $this->projectRepository->edit($id);
    }

    public function update(array $data, $id)
    {
        $data = Helpers::stripHtmlTags($data);
        $project = $this->projectRepository->update($data, $id);
        $employeeIds = $data['selected_employees'] ?? [];
        $project->addEmployee($employeeIds);
        return $project;
    }

    public function delete($id)
    {
        $project = $this->projectRepository->delete($id);
    }

    public function searchProject($key)
    {
        return $this->projectRepository->search($key);
    }
}
