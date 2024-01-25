<?php

namespace App\Repositories\Leave;

use App\Models\Leave;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Leave\LeaveRepository;


/**
 * Class LeaveRepositoryEloquent.
 *
 * @package namespace App\Repositories\Leave;
 */
class LeaveRepositoryEloquent extends BaseRepository implements LeaveRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    const DEFAULT_PER_PAGE = 6;
    public function model()
    {
        return Leave::class;
    }

    public function getByEmployeeId($employeeId)
    {
        return $this->model->with('employee')->where('employee_id', $employeeId)->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }

    public function getById($id)
    {
        return $this->model->with('employee')->findOrFail($id);
    }

    public function getAllLeaves()
    {
        return $this->model->with('employee')->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }

    public function updateStatus($id, $status)
    {
        $leave = $this->findOrFail($id);
        $leave->status = $status;
        $leave->save();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
