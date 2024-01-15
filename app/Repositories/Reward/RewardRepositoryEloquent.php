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
    /**
     * Specify Model class name
     *
     * @return string
     */
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


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
