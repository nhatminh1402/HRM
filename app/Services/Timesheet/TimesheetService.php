<?php

namespace App\Services\Timesheet;

use App\Repositories\Timesheet\TimesheetRepository;

class TimesheetService
{
    protected $timesheetRepository;
    public function __construct(TimesheetRepository $timesheetRepository)
    {
        $this->timesheetRepository = $timesheetRepository;
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
}
