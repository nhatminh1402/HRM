<?php

namespace App\Repositories\Reward;

use App\Models\Reward;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        return $this->model->create($attributes);
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

    public function delete($id)
    {
        try {
            $reward = $this->model->findOrFail($id);
            $reward->delete();
        } catch (ModelNotFoundException $exeption) {
            return abort(404);
        }
    }

    public function update(array $attributes, $id)
    {
        try {
            $reward = $this->model->findOrFail($id);
            $reward->update($attributes);
        } catch (ModelNotFoundException $exeption) {
            return abort(404);
        }
    }

    public function find($id, $columns = ['*'])
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $exeption) {
            return abort(404);
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
