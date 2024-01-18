<?php

namespace App\Repositories\Project;

use App\Models\Employee;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Project\ProjectRepository;
use App\Models\Project;
use Illuminate\Http\Response;

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

    public function create(array $data)
    {
        return $this->model->created($data);
    }

    public function getAllEmployees()
    {
        return Employee::all();
    }

    public function update(array $data, $id)
    {
        $project = $this->model->find($id);

        if ($project) {
            return response()->json(['message' => 'Không tìm thấy dự án'], Response::HTTP_NOT_FOUND);
        }

        $project->fill($data);
        $project->save();
        return $project;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
