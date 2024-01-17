<?php

namespace App\Repositories\Timesheet;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return Timesheet::all();
    }

    public function gettimesheet($data)
    {
        return Timesheet::where('employee_id', $data)
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->first();
    }

    public function checkin(array $data)

    {
        return Timesheet::create($data);
    }

    public function updateOnDay($data)
    {
        return $this->gettimesheet($data)->touch();
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
