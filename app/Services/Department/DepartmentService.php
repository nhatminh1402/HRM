<?php
namespace App\Services\Department;

use App\Helpers;
use App\Repositories\Deparment\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getallDeparment()
    {
        return $this->departmentRepository->getAll();
    }

    public function getEmployeeCode($prefix)
    {
        $employeeCode = Helpers::generateCode($prefix);
        return $employeeCode;
    }

    public function createDepartment(array $data)
    {
        $dataHtml = Helpers::stripHtmlTags($data);
        $prefix = 'MPB';
        if ($dataHtml) {
            $dataHtml['code_department'] = $this->getEmployeeCode($prefix);
        }
        return $this->departmentRepository->create($dataHtml);
    }

    public function getDetailDepartment($id)
    {

        return $this->departmentRepository->getById($id);
    }

    public function updateDepartment(array $data, $id)
    {
        $dataHtml = Helpers::stripHtmlTags($data);
        return $this->departmentRepository->update($dataHtml, $id);
    }

    public function deleteDepartment($id)
    {
        return $this->departmentRepository->delete($id);
    }
    public function getEmployees($id)
    {
        return $this->departmentRepository->getListEmployee($id);
    }
    public function searchDepartment($key)
    {
        return $this->departmentRepository->search($key);
    }

    public function all($columns = ['*'])
    {
        return $this->departmentRepository->all($columns);
    }
}