<?php

namespace App\Repositories\Deparment;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DepartmentRepositoryRepository.
 *
 * @package namespace App\Repositories\DeparmentRepository;
 */
interface DepartmentRepository extends RepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function getById($id);
    public function update(array $data, $id);
    public function delete($id);
    public function getListEmployee($id);
    public function search($key);
}
