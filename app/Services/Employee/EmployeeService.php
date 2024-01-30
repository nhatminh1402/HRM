<?php

namespace App\Services\Employee;

use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Traits\ImgProcess;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeService
{
    use ImgProcess;

    protected $employeeRepository;

    protected $timesheetRepository;

    public function __construct(EmployeeRepository $employeeRepository, TimesheetRepository $timesheetRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->timesheetRepository = $timesheetRepository;
    }

    public function showallemployee()
    {
        return $this->employeeRepository->showall();
    }

    public function getById($id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function searchEmploy($key)
    {
        return $this->employeeRepository->search($key);
    }

    public function create(array $attributes)
    {
        try {
            DB::beginTransaction();
            $this->employeeRepository->create($attributes);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            File::delete(public_path('uploads/' . $attributes['image']));
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getEmployeeDepartmentNull()
    {
        return $this->employeeRepository->getEmployeDepartmentNull();
    }

    public function setDepartmentId($employee_id, $department_id)
    {
        $employee = $this->employeeRepository->getById($employee_id);
        $employee->department_id = $department_id;
        $employee->save();
    }

    public function update(array $attributes, $id)
    {
        $this->employeeRepository->update($attributes, $id);
    }

    public function getWorkingDaysInMonth($employeeId)
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        return $this->timesheetRepository->countWorkDayInMonth($employeeId, $month, $year);
    }

    public function all($columns = ['*'])
    {
        return $this->employeeRepository->all($columns);
    }

    public function exportData($KeySearch = null)
    {
        return $this->employeeRepository->exportData($KeySearch);
    }

    public function countEmployeeChangesByMonth()
    {
        return $this->employeeRepository->countEmployeeChangesByMonth();
    }
}
