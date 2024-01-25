<?php

namespace App\Services\Timeline;
use App\Repositories\Timeline\TimelineRepository;

class TimelineService
{
    protected $timelineRepository;
    public function __construct(TimelineRepository $timelineRepository)
    {
        $this->timelineRepository = $timelineRepository;
    }

    public function getTimelineOfEmployee($employeeId)
    {
        return $this->timelineRepository->getTimelineOfEmployee($employeeId);
    }
}
