<?php

namespace App\Repositories\Employee;

use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Employee\EmployeeRepository;
use App\Validators\EmployeeRepository\EmployeeValidator;
use Illuminate\Http\Response;

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
        return $this->model->with('province', 'district', 'ward', 'department', 'position')->get();
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
                    ->orWhere('nationality', 'LIKE', "%{$key}%")
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

            if ($salaryUpdate != $employee->basic_salary || $positionUpdate != $employee->position_id) { // nếu có thay đổi về lương hoặc chức vụ thì lưu vào timeline
                $employee->timelines()->create($attributes);
            }

            // Cập nhật lại thông tin nhân viên
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
}
