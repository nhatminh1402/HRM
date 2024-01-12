<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PositionRepository.
 *
 * @package namespace App\Repositories;
 */
interface PositionRepository extends RepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function edit($id);

    public function delete($id);
}
