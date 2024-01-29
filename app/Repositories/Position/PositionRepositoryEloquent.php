<?php

namespace App\Repositories\Position;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Position\PositionRepository;
use App\Models\Position;
use Illuminate\Http\Response;

/**
 * Class PositionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PositionRepositoryEloquent extends BaseRepository implements PositionRepository
{
    const DEFAULT_PER_PAGE = 10;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Position::class;
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
        $position->code_position = request()->input('code_position_update');
        $position->name = request()->input('name_update');
        $position->salary_day = request()->input('salary_day_update');
        $position->description = request()->input('description_update');
        if (!$position) {
            throw new \Exception("Không tìm thấy chức vụ!");
        }

        $position->fill($data);
        $position->save();
        return $position;
    }

    public function getAll()
    {
        return $this->model->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function delete($id)
    {
        try {
            $position = $this->model->find($id);
            if (!$position) {
                return response()->json(['message' => 'Không tìm thấy loại kỷ luật !'], Response::HTTP_NOT_FOUND);
            }

            $position->delete($id);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại !'], Response::HTTP_NOT_FOUND);

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
            ->searchByCodePosition($key)
            ->orWhere(function ($query) use ($key) {
                $query->searchByName($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByDescription($key);
            })
            ->paginate(self::DEFAULT_PER_PAGE);
    }
}

