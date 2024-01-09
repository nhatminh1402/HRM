<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TimesheetServices\TimesheetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimesheerController extends Controller
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

    public function checkin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $validator->errors(),
            ], 422);
        }

        $timesheet = $this->Timesheetservice->checkin($request->all(), $request->employee_id);

        return response()->json(['message' => 'Timesheet created or updated successfully', 'data' => $timesheet], 201);
    }
}
