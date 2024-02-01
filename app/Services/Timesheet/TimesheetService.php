<?php

namespace App\Services\Timesheet;

use App\Repositories\Timesheet\TimesheetRepository;
use Carbon\Carbon;
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

    public function showTimeSheet($selectedYear,$selectedMonth)
    {
        $daysInMonth = Carbon::create($selectedYear, $selectedMonth)->daysInMonth;

        $dates = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($selectedYear, $selectedMonth, $day);
            $dates[] = [
                'date' => $date,
                'day_of_week' => $date->formatLocalized('%A'), // Lấy tên thứ dưới dạng văn bản
            ];
        }
        $idUser = $this->getIdUser();
        $timesheets = $this->timesheetRepository->showTimesheet( $idUser);
        foreach ($dates as &$date) {
            $matchingTimesheet = $timesheets->first(function ($timesheet) use ($date) {
                return $timesheet->created_at->format('Y-m-d') === $date['date']->format('Y-m-d');
            });
            $date['employee'] = $matchingTimesheet ? $matchingTimesheet->employee->full_name : null;
            $date['workingtime'] = $matchingTimesheet ? $matchingTimesheet->workingtime : null;
            $date['code_employee'] = $matchingTimesheet ? $matchingTimesheet->employee->code_employee : null;
            $date['check_in'] = $matchingTimesheet ? $matchingTimesheet->created_at->format('H:i') : null;
            $date['check_out'] = $matchingTimesheet ? $matchingTimesheet->updated_at->format('H:i') : null;
        }
        return $dates;
    }
}