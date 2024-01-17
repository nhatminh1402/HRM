<?php

namespace App\Repositories\Timesheet;

use Illuminate\Support\Arr;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TimesheetRepository.
 *
 * @package namespace App\Repositories\Timesheetrepository;
 */
interface TimesheetRepository extends RepositoryInterface
{
    public function showall();
    public function gettimesheet($data);
    public function checkin(array $data);
    public function updateOnDay($data);
}
