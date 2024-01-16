<?php

namespace App\Services\Reward;

use App\Repositories\Reward\RewardRepository;
use Exception;

/**
 * Class PositionService.
 */
class RewardService
{
    private $rewardRepository;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }

    public function create(array $attributes)
    {
        try {
            return $this->rewardRepository->create($attributes);
        } catch (Exception $e) {
            return abort(500);
        }
    }

    public function search()
    {
        return $this->rewardRepository->search();
    }

    public function delete($id)
    {
        $this->rewardRepository->delete($id);
    }
}
