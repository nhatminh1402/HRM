<?php

namespace App\Repositories\Project;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectRepository.
 *
 * @package namespace App\Repositories\Project;
 */
interface ProjectRepository extends RepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function edit($id);

    public function update(array $data, $id);

    public function getAllEmployees();
}
