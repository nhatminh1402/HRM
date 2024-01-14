<?php

namespace App\Repositories\EmployeeRepository;

use App\Models\Employee;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmployeeRepository\EmployeeRepository;
use App\Validators\EmployeeRepository\EmployeeValidator;

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

        return $this->model->with('province', 'district', 'ward')->get();
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
        return $this->model->create($attributes);
    }

    /** 
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
