<?php

namespace App\Providers;

use App\Repositories\Timesheet\TimesheetRepository;
use App\Repositories\Timesheet\TimesheetRepositoryEloquent;
use App\Repositories\Deparment\DepartmentRepository;
use App\Repositories\Deparment\DepartmentRepositoryEloquent;
use App\Repositories\Discipline\DisciplineRepository;
use App\Repositories\Discipline\DisciplineRepositoryEloquent;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Employee\EmployeeRepositoryEloquent;
use App\Repositories\Location\Province\ProvinceRepository as ProvinceProvinceRepository;
use App\Repositories\Location\Province\ProvinceRepositoryEloquent;
use App\Repositories\Location\Ward\WardRepository;
use App\Repositories\Location\Ward\WardRepositoryEloquent;
use App\Repositories\Position\PositionRepository;
use App\Repositories\Position\PositionRepositoryEloquent;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ProjectRepositoryEloquent;
use App\Repositories\Reward\RewardRepository;
use App\Repositories\Reward\RewardRepositoryEloquent;
use App\Repositories\Salary\SalaryRepository;
use App\Repositories\Salary\SalaryRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TimesheetRepository::class,TimesheetRepositoryEloquent::class);
        $this->app->bind(EmployeeRepository::class, EmployeeRepositoryEloquent::class);
        $this->app->bind(PositionRepository::class, PositionRepositoryEloquent::class);
        $this->app->bind(DepartmentRepository::class, DepartmentRepositoryEloquent::class);
        $this->app->bind(ProvinceProvinceRepository::class, ProvinceRepositoryEloquent::class);
        $this->app->bind(WardRepository::class, WardRepositoryEloquent::class);
        $this->app->bind(RewardRepository::class, RewardRepositoryEloquent::class);
        $this->app->bind(DisciplineRepository::class, DisciplineRepositoryEloquent::class);
        $this->app->bind(ProjectRepository::class, ProjectRepositoryEloquent::class);
        $this->app->bind(SalaryRepository::class, SalaryRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
