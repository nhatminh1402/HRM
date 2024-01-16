<?php

namespace App\Repositories\Reward;

use App\Models\Reward;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Reward\RewardRepository;
use App\Validators\Reward\RewardValidator;
use Exception;

/**
 * Class RewardRepositoryEloquent.
 *
 * @package namespace App\Repositories\Reward;
 */
class RewardRepositoryEloquent extends BaseRepository implements RewardRepository
{
    const DEFAULT_PER_PAGE = 5;

    public function model()
    {
        return Reward::class;
    }

    public function create(array $attributes)
    {
        try {
            return $this->model->create($attributes);
        } catch (Exception $e) {
            return abort(500);
        }
    }

    public function search()
    {
        $query = $this->model->orderBy('id', 'desc');
        return $query
            ->orderBy('id', 'desc')
            ->searchByName()
            ->searchByDescription()
            ->paginate(self::DEFAULT_PER_PAGE);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
