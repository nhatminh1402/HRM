<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PositionRepository;
use App\Models\Position;
use App\Validators\PositionValidator;

/**
 * Class PositionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PositionRepositoryEloquent extends BaseRepository implements PositionRepository
{
    const DEFAULT_PER_PAGE = 4;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Position::class;
    }

    public function getAll()
    {
        return $this->model->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }

    public function create(array $data)
    {
        return $this->model->created($data);
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        $position = $this->model->find($id);

        if (!$position) {
            throw new \Exception("Không tìm thấy chức vụ!");
        }

        $position->fill($data);

        $position->save();

        return $position;
    }

    public function delete($id)
    {
        try {
            $position = $this->model->find($id);

            if (!$position) {
                throw new \Exception("Không tìm thấy chức vụ!");
            }

            $position->delete($id);

        } catch (\Throwable $th) {
            throw new \Exception("Đã xảy ra lỗi, vui lòng thử lại !");
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function search($key)
    {
        return $this->model
            ->searchByName($key)
            ->orWhere(function ($query) use ($key) {
                $query->searchByDescription($key);
            })
            ->paginate(self::DEFAULT_PER_PAGE);
    }
}

