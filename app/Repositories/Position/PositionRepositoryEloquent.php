<?php

namespace App\Repositories\Position;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Position\PositionRepository;
use App\Models\Position;
use Exception;
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

        if (!$position) {
            throw new Exception("Không tìm thấy chức vụ!");
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
                throw new Exception('Không tìm thấy loại chức vụ!');
            }

            $position->delete();
            return redirect()->back()->with('success', 'Xóa thành công loại chức vụ!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi, vui lòng thử lại!');
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

