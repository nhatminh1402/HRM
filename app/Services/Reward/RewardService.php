<?php

namespace App\Services\Reward;

use App\Repositories\Reward\RewardRepository;
use Exception;

class RewardService
{
    private $rewardRepository;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }

    public function create(array $attributes)
    {
        return $this->rewardRepository->create($attributes);
    }

    public function search()
    {
        return $this->rewardRepository->search();
    }

    public function delete($id)
    {
        $this->rewardRepository->delete($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->rewardRepository->find($id, $columns);
    }

    public function update(array $attributes, $id)
    {
        return $this->rewardRepository->update($attributes, $id);
    }
}
