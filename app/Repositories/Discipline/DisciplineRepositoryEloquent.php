<?php

namespace App\Repositories\Discipline;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Discipline;
use Exception;
use Illuminate\Http\Response;

/**
 * Class DesciplineRepositoryEloquent.
 *
 * @package namespace App\Repositories\Discipline;
 */
class DisciplineRepositoryEloquent extends BaseRepository implements DisciplineRepository
{
    const DEFAULT_PER_PAGE = 10;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Discipline::class;
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
        $discipline = $this->model->find($id);
        if (!$discipline) {
            throw new Exception("Không tìm thấy loại kỷ luật!");
        }

        $discipline->fill($data);
        $discipline->save();
        return $discipline;
    }

    public function delete($id)
    {
        try {
            $discipline = $this->model->find($id);

            if (!$discipline) {
                throw new Exception('Không tìm thấy loại kỷ luật!');
            }

            $discipline->delete($id);

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi, vui lòng thử lại!');

        }
    }

    public function search($key)
    {
        return $this->model
            ->searchByName($key)
            ->orWhere(function ($query) use ($key) {
                $query->searchByDisciplineCode($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByDescription($key);
            })
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
