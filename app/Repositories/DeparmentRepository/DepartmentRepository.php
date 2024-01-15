<?php

namespace App\Repositories\DeparmentRepository;

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
}
