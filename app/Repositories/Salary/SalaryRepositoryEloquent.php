<?php

namespace App\Repositories\Salary;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Salary\SalaryRepository;
use App\Models\Salary;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class SalaryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Salary;
 */
class SalaryRepositoryEloquent extends BaseRepository implements SalaryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Salary::class;
    }

    public function getNamePosition()
    {
        $positionNames = [];

        $salaries = $this->model->with('positions')->get();

        foreach ($salaries as $salary) {
            $positionName = $salary->position->name;
            $positionNames[] = $positionName;
        }

        return $positionNames;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
