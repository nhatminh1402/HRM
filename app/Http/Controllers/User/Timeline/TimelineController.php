<?php

namespace App\Http\Controllers\User\Timeline;

use App\Http\Controllers\Controller;
use App\Services\Timeline\TimelineService;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    private $timelineService;

    public function __construct(TimelineService $timelineservice)
    {
        $this->timelineService = $timelineservice;
    }

    public function index()
    {
        $employeeId = Auth::guard('employee')->id();
        $timelineInfor = $this->timelineService->getTimelineOfEmployee($employeeId);
        return view('user.pages.time_line', compact('timelineInfor'));
    }
}
