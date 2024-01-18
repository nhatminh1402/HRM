<?php

namespace App\Services\Timesheet;

use App\Repositories\Timesheet\TimesheetRepository;
use Illuminate\Support\Facades\Auth;

class TimesheetService
{
    protected $timesheetRepository;
    public function __construct(TimesheetRepository $timesheetRepository)
    {
        $this->timesheetRepository = $timesheetRepository;
    }

    public function getIdUser()
    {
        return Auth::guard('employee')->user()->id;
    }

    public function showall()
    {
        return $this->timesheetRepository->showall();
    }

    public function checkin($data, $id)
    {
        $timesheet = $this->timesheetRepository->gettimesheet($id);
        if ($timesheet) {
            $this->timesheetRepository->updateOnDay($id);
        } else {
            return $this->timesheetRepository->checkin($data);
        }
        return $timesheet;
    }

    public function showTimeSheet($id)
    {
        return $this->timesheetRepository->showTimesheet($id);
    }
}