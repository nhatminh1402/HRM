<?php

namespace App\Http\Controllers\User\Timesheet;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use App\Services\Timesheet\TimesheetService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    protected $timeSheetService;

    public function __construct(TimesheetService $timeSheetService)
    {
        $this->timeSheetService = $timeSheetService;
    }

    public function showTimesheet(Request $request)
    {
        $selectedMonth = $request->input('month') ?? Carbon::now()->month;
        $selectedYear = $request->input('year') ?? Carbon::now()->year;
        $daysInMonth = Carbon::create($selectedYear, $selectedMonth)->daysInMonth;

        $dates = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($selectedYear, $selectedMonth, $day);
            $dates[] = [
                'date' => $date,
                'day_of_week' => $date->formatLocalized('%A'), // Lấy tên thứ dưới dạng văn bản
            ];
        }
        $idUser = $this->timeSheetService->getIdUser();
        $timesheets = $this->timeSheetService->showTimeSheet($idUser);
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

        return view('user.pages.time_sheet', compact('dates', 'selectedMonth', 'selectedYear'));
    }
}

