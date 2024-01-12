<?php

namespace App\Providers;

use App\Repositories\EmployeeRepository\EmployeeRepository;
use App\Repositories\EmployeeRepository\EmployeeRepositoryEloquent;
use App\Repositories\PositionRepository;
use App\Repositories\PositionRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeRepository::class, EmployeeRepositoryEloquent::class);
        $this->app->bind(PositionRepository::class,PositionRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
