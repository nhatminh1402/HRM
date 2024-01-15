<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\Department;
use App\Repositories\DeparmentRepository\DepartmentRepository;
use App\Repositories\DeparmentRepository\DepartmentRepositoryEloquent;
=======
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Department\DepartmentRepositoryEloquent;
>>>>>>> 89b69c0e05ab31da5c5cfd824eabab8f8c31b4d3
use App\Repositories\EmployeeRepository\EmployeeRepository;
use App\Repositories\EmployeeRepository\EmployeeRepositoryEloquent;
use App\Repositories\Location\Province\ProvinceRepository as ProvinceProvinceRepository;
use App\Repositories\Location\Province\ProvinceRepositoryEloquent;
use App\Repositories\Location\Ward\WardRepository;
use App\Repositories\Location\Ward\WardRepositoryEloquent;
use App\Repositories\Position\PositionRepository;
use App\Repositories\Position\PositionRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
<<<<<<< HEAD
        $this->app->bind(EmployeeRepository::class,EmployeeRepositoryEloquent::class);
        $this->app->bind(PositionRepository::class,PositionRepositoryEloquent::class);
        $this->app->bind(DepartmentRepository::class,DepartmentRepositoryEloquent::class);
=======
        $this->app->bind(EmployeeRepository::class, EmployeeRepositoryEloquent::class);
        $this->app->bind(PositionRepository::class, PositionRepositoryEloquent::class);
        $this->app->bind(ProvinceProvinceRepository::class, ProvinceRepositoryEloquent::class);
        $this->app->bind(WardRepository::class, WardRepositoryEloquent::class);
        $this->app->bind(DepartmentRepository::class, DepartmentRepositoryEloquent::class);
>>>>>>> 89b69c0e05ab31da5c5cfd824eabab8f8c31b4d3
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
