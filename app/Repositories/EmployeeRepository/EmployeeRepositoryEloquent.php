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
        return Employee::paginate(4)->withQueryString();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
