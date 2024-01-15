<?php

namespace App\Repositories\Department;

use App\Models\Department;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Department\DepartmentRepository;
use App\Validators\Department\DepartmentValidator;

/**
 * Class DepartmentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Department;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Department::class;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
