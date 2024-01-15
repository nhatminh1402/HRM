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
}
