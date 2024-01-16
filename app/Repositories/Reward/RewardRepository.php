<?php

namespace App\Repositories\Reward;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RewardRepository.
 *
 * @package namespace App\Repositories\Reward;
 */
interface RewardRepository extends RepositoryInterface
{
    public function create(array $attributes);
    public function search();
    public function all($columns = ['*']);
    public function delete($id);
    public function update(array $attributes, $id);
    public function find($id, $columns = ['*']);

}
