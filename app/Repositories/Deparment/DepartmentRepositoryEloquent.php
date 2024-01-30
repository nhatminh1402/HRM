<?php

namespace App\Repositories\Deparment;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Deparment\DepartmentRepository;
use App\Models\Department;


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

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getListEmployee($id)
    {
        $department = $this->getById($id);
        return $department->employee()->paginate(self::DEFAULT_PER_PAGE);
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
