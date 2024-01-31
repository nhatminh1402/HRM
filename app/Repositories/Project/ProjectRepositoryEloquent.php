<?php

namespace App\Repositories\Project;

use DB;
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

    public function update(array $data, $id)
    {
        $project = $this->model->find($id);

        if (!$project) {
            return response()->json(['message' => 'Không tìm thấy dự án'], Response::HTTP_NOT_FOUND);
        }

        $project->fill($data);
        $project->save();
        return $project;
    }

    public function edit($id)
    {
        return $this->model->with('employees')->find($id);
    }

    public function delete($id)
    {
        try {
            $project = $this->model->find($id);

            if (!$project) {
                return response()->json(['message' => 'Không tìm thấy dự án!'], Response::HTTP_NOT_FOUND);
            }

            $project->removeAllEmployee();

            if (!$project->delete()) {
                return response()->json(['message' => 'Lỗi khi xóa dự án!'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return response()->json(['message' => 'Xóa dự án thành công!'], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại!'], Response::HTTP_INTERNAL_SERVER_ERROR);
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

    public function countEmployeeInEachProject()
    {
        $currentYear = now()->year;

        return $this->model->select('projects.name', DB::raw('count(employee_has_project.employee_id) as total'))
            ->leftJoin('employee_has_project', 'employee_has_project.project_id', '=', 'projects.id')
            ->groupBy('projects.id', 'projects.name')
            ->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
