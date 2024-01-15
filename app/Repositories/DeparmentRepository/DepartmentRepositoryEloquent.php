<?php

namespace App\Repositories\DeparmentRepository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DeparmentRepository\DepartmentRepository;
use App\Models\Department;
use App\Validators\DeparmentRepository\DepartmentRepositoryValidator;

/**
 * Class DepartmentRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories\DeparmentRepository;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    const DEFAULT_PER_PAGE = 6;
    public function model()
    {
        return Department::class;
    }

    public function getAll()
    {
        return $this->model->latest('id')->paginate(self::DEFAULT_PER_PAGE)->withQueryString();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getById($id)
    {
        return $this->model->findOrfail($id);
    }

    public function update(array $data, $id)
    {
        return $this->getById($id)->update($data);
    }

    public function delete($id){
       return   $this->model->find($id)->delete();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
