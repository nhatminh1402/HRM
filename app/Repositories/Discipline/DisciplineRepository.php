<?php

namespace App\Repositories\Discipline;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DesciplineRepository.
 *
 * @package namespace App\Repositories\Discipline;
 */
interface DisciplineRepository extends RepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function edit($id);

    public function delete($id);

    public function search($key);
}
