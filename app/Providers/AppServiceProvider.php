<?php

namespace App\Providers;

use App\Repositories\Timesheetrepository\TimesheetRepository;
use App\Repositories\Timesheetrepository\TimesheetRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TimesheetRepository::class,TimesheetRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
