<?php

namespace App\Repositories\Timeline;

use App\Models\Timeline;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Timeline\TimelineRepository;
use App\Validators\Timeline\TimelineValidator;

/**
 * Class TimelineRepositoryEloquent.
 *
 * @package namespace App\Repositories\Timeline;
 */
class TimelineRepositoryEloquent extends BaseRepository implements TimelineRepository
{
    const DEFAULT_PER_PAGE = 5;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Timeline::class;
    }

    public function getTimelineOfEmployee($employeeId)
    {
        return $this->model->where('employee_id', $employeeId)->paginate(self::DEFAULT_PER_PAGE);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
