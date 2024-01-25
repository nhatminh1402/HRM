<?php

namespace App\Repositories\Timeline;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TimelineRepository.
 *
 * @package namespace App\Repositories\Timeline;
 */
interface TimelineRepository extends RepositoryInterface
{
    public function getTimelineOfEmployee($employeeId);
}
