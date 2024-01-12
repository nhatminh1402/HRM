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
    public function model()
    {
        return Employee::class;
    }

    public function showall()
    {
        return $this->model->paginate(4)->withQueryString();
    }

    public function Jointable()
    {
     
        return $this->model->leftJoin('provinces', 'employees.province_id', '=', 'provinces.id')
            ->leftJoin('districts', 'employees.district_id', '=', 'districts.id')
            ->leftJoin('wards', 'employees.ward_id', '=', 'wards.id')
            ->select('employees.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->get();
    }

    public function getById($id)
    {
        return $this->Jointable()->find($id);
    }
    public function search($key){
        
        return $this->model->where('code_employee', 'LIKE', "%{$key}%")
                            ->orWhere('full_name', 'LIKE', "%{$key}%")
                            ->orWhere('email', 'LIKE', "%{$key}%")
                            ->orWhere('phone_number', 'LIKE', "%{$key}%")
                            ->orWhere('dob', 'LIKE', "%{$key}%")
                            ->orWhere('nationality', 'LIKE', "%{$key}%")
                            ->orWhere('degree', 'LIKE', "%{$key}%")
                            ->latest('id')->paginate(4)->withQueryString();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
