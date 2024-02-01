<?php

namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Employee\EmployeeRepository;

/**
 * Class EmployeeRepositoryEloquent.
 *
 * @package namespace App\Repositories\EmployeeRepository;
 */
class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    const DEFAULT_PER_PAGE = 4;

    public function model()
    {
        return Employee::class;
    }

    public function showall()
    {
        return $this->model->paginate(self::DEFAULT_PER_PAGE)->withQueryString();
    }

    public function Jointable()
    {
        return $this->model->with('province', 'district', 'ward', 'department', 'position', 'salary')->get();
    }

    public function getById($id)
    {
        return $this->Jointable()->find($id);
    }

    public function search($key)
    {
        $query = $this->model->latest('id');

        if (!empty($key)) {
            $query->where(function ($q) use ($key) {
                $q->where('code_employee', 'LIKE', "%{$key}%")
                    ->orWhere('full_name', 'LIKE', "%{$key}%")
                    ->orWhere('email', 'LIKE', "%{$key}%")
                    ->orWhere('phone_number', 'LIKE', "%{$key}%")
                    ->orWhere('dob', 'LIKE', "%{$key}%")
                    ->orWhere('degree', 'LIKE', "%{$key}%");
            });
        }

        return $query->paginate(self::DEFAULT_PER_PAGE)->withQueryString();
    }

    public function create(array $attributes)
    {
        // insert dữ liệu cho bảng nhân viên
        $employee = $this->model->create($attributes);
        // cập nhật dữ liệu cho bảng timeline của nhân viên vừa được tạo
        $employee->timelines()->create($attributes);
    }

    public function getEmployeDepartmentNull()
    {
        return $this->model->where('department_id', null)->get();
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function update(array $attributes, $id)
    {
        try {
            $employee = $this->model->findOrFail($id);
            $salaryUpdate = $attributes['basic_salary'];
            $positionUpdate = $attributes['position_id'];

            if ($salaryUpdate != $employee->basic_salary || $positionUpdate != $employee->position_id) {
                $employee->timelines()->create($attributes);
            }

            $employee->update($attributes);
        } catch (ModelNotFoundException $exeption) {
            return abort(404);
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllEmployee()
    {
        $this->model->all();
    }

    public function getByIds(array $employeeIds)
    {
        return $this->model->whereIn('id', $employeeIds)->get();
    }

    public function countWorkDayInMonth($employeeId)
    {
        $firstDayOfMonth = now()->startOfMonth();
        $lastDayOfMonth = now()->endOfMonth();

        $workDays = $this->model
            ->with('timeSheet')
            ->where('id', $employeeId)
            ->whereHas('timeSheet', function ($query) use ($firstDayOfMonth, $lastDayOfMonth) {
                $query->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth]);
            })
            ->get()
            ->flatMap(function ($employee) {
                return $employee->timeSheet->pluck('created_at')->map(function ($date) {
                    return $date->format('Y-m-d');
                });
            })
            ->unique()
            ->count();
        return $workDays;
    }

    public function getBasicSalary($employeeId)
    {
        $employee = $this->model->findOrFail($employeeId);

        if ($employee) {
            return $employee->basic_salary;
        }
        return null;
    }

    public function exportData($KeySearch = null)
    {
        if ($KeySearch == null) {
            return $this->model->all();
        }

        return $this->model
            ->latest('id')
            ->where('code_employee', 'LIKE', "%{$KeySearch}%")
            ->orWhere('full_name', 'LIKE', "%{$KeySearch}%")
            ->orWhere('email', 'LIKE', "%{$KeySearch}%")
            ->orWhere('phone_number', 'LIKE', "%{$KeySearch}%")
            ->orWhere('dob', 'LIKE', "%{$KeySearch}%")
            ->orWhere('degree', 'LIKE', "%{$KeySearch}%")
            ->get();
    }

    public function countEmployeeChangesByMonth($year)
    {
        return $this->model
            ->select(DB::raw('Month(created_at) as month,COUNT(id) as total'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
    }

    public function countEmployeeInEachDepartment()
    {
        return $this->model
            ->select('departments.name', DB::raw('count(employees.id) as total'))
            ->rightJoin('departments', 'departments.id', '=', 'employees.department_id')
            ->groupBy('departments.id', 'departments.name')
            ->get();
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function verifyToken($id, $token)
    {
        return $this->model
            ->where('id', $id)
            ->where('remember_token', $token)
            ->first();
    }
}
