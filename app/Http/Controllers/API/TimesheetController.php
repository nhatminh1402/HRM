<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimesheetRequest;
use App\Services\Timesheet\TimesheetService;


class TimesheetController extends Controller
{
    protected $Timesheetservice;
    public function __construct(TimesheetService $Timesheetservice)
    {
        $this->Timesheetservice = $Timesheetservice;
    }
    
    public function checkin(TimesheetRequest $request)
    {
        $timesheet = $this->Timesheetservice->checkin($request->all(), $request->employee_id);
        return response()->json(['message' => 'Timesheet created or updated successfully', 'data' => $timesheet], 201);
    }
}
