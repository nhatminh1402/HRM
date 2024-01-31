<?php

namespace App\Repositories\Project;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Project\ProjectRepository;
use App\Models\Project;
use Exception;

/**
 * Class ProjectRepositoryEloquent.
 *
 * @package namespace App\Repositories\Project;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    const DEFAULT_PER_PAGE = 4;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    public function getAll()
    {
        return $this->model->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }

    public function update(array $data, $id)
    {
        $project = $this->model->find($id);

        if (!$project) {
            throw new Exception("Không tìm thấy dự án!");
        }

        $project->fill($data);
        $project->save();
        return $project;
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        try {
            $project = $this->model->find($id);

            if (!$project) {
                throw new Exception("Không tìm thấy dự án!");
            }

            $project->removeAllEmployee();

            if (!$project->delete()) {
                throw new Exception("Đã xảy ra lỗi, vui lòng thử lại!");
            }

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi, vui lòng thử lại!');
        }
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

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
