<?php

namespace App\Http\Controllers\User\Timesheet;

use App\Http\Controllers\Controller;
use App\Services\Timesheet\TimesheetService;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    protected $timeSheetService;
    public function __construct(TimesheetService $timeSheetService)
    {
        $this->timeSheetService = $timeSheetService;
    }
    public function showtimesheet()
    {
        $idUser = $this->timeSheetService->getIdUser();
        $timesheets = $this->timeSheetService->showTimeSheet($idUser);
        return view('user.pages.time_sheet', compact('timesheets'));
    }   
}
