<?php

namespace App\Repositories\Salary;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Salary\SalaryRepository;
use App\Models\Salary;

/**
 * Class SalaryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Salary;
 */
class SalaryRepositoryEloquent extends BaseRepository implements SalaryRepository
{
    const DEFAULT_PER_PAGE = 4;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Salary::class;
    }

    public function all($columns = ['*'])
    {
        return $this->model->latest('id')->paginate(self::DEFAULT_PER_PAGE);
    }
    public function search($key)
    {
        return $this->model
            ->searchByCodeSalary($key)
            ->orWhere(function ($query) use ($key) {
                $query->searchByMonthSalary($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByNameEmployee($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByNamePosition($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByWorkDay($key);
            })
            ->orWhere(function ($query) use ($key) {
                $query->searchByCreatedAt($key);
            })->paginate(self::DEFAULT_PER_PAGE);   
    }

    public function exportData($keySearch)
    {
        return $this->model
            ->searchByCodeSalary($keySearch)
            ->orWhere(function ($query) use ($keySearch) {
                $query->searchByMonthSalary($keySearch);
            })
            ->orWhere(function ($query) use ($keySearch) {
                $query->searchByNameEmployee($keySearch);
            })
            ->orWhere(function ($query) use ($keySearch) {
                $query->searchByNamePosition($keySearch);
            })
            ->orWhere(function ($query) use ($keySearch) {
                $query->searchByWorkDay($keySearch);
            })
            ->orWhere(function ($query) use ($keySearch) {
                $query->searchByCreatedAt($keySearch);
            })->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
