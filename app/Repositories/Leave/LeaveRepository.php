<?php

namespace App\Repositories\Leave;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LeaveRepository.
 *
 * @package namespace App\Repositories\Leave;
 */
interface LeaveRepository extends RepositoryInterface
{
    public function getByEmployeeId($employeeId);
    public function getById($id);
    public function getAllLeaves();
    public function updateStatus($id, $status);
    public function create($data);
}
