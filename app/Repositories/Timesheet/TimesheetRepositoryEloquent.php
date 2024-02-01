<?php

namespace App\Repositories\Timesheet;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Models\Timesheet;
use Carbon\Carbon;

/**
 * Class TimesheetRepositoryEloquent.
 *
 * @package namespace App\Repositories\Timesheetrepository;
 */
class TimesheetRepositoryEloquent extends BaseRepository implements TimesheetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Timesheet::class;
    }

    public function showall()
    {
        return $this->model->all();
    }

    public function gettimesheet($data)
    {
        return $this->model->where('employee_id', $data)
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->first();
    }

    public function checkin(array $data)
    {
        return $this->model->create($data);
    }

    public function updateOnDay($data)
    {
        return $this->gettimesheet($data)->touch();
    }

    public function showTimesheet($id)
    {
        return $this->model->with('employee')->where('employee_id', $id)->selectRaw('*, timediff(updated_at, created_at) as workingtime')->get();
    }

    public function countWorkDayInMonth($employeeId, $month, $year)
    {
        $count = $this->model->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->whereHas('employee', function ($query) use ($employeeId) {
                $query->where('id', $employeeId);
            })
            ->count();
        return $count;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
