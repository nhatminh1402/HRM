<?php

namespace App\Http\Controllers\User\Timesheet;

use App\Http\Controllers\Controller;
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
        $dates = $this->timeSheetService->showTimeSheet( $selectedYear,$selectedMonth);
        return view('user.pages.time_sheet', compact('dates', 'selectedMonth', 'selectedYear'));
    }
}

