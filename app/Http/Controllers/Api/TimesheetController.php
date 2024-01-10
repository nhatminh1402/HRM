<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimesheetRequest;
use App\Services\TimesheetServices\TimesheetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimesheetController extends Controller
{
    protected $Timesheetservice;
    public function __construct(TimesheetService $Timesheetservice)
    {
        $this->Timesheetservice = $Timesheetservice;
    }

    public function index()
    {
        return $this->Timesheetservice->showall();
    }


    public function create()
    {
        //
    }

    public function checkin(TimesheetRequest $request)
    {

        $timesheet = $this->Timesheetservice->checkin($request->all(), $request->employee_id);

        return response()->json(['message' => 'Timesheet created or updated successfully', 'data' => $timesheet], 201);
    }
}
