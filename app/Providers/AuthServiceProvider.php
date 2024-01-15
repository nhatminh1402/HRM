<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

<<<<<<< HEAD
            // $permissions = Permission::all();

            // foreach ($permissions as $permission) {
            //     Gate::define($permission->name, function ($user) use ($permission) {
            //         return $user->hasPermissions($permission->name);
            //     });
            // }
=======
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermissions($permission->name);
            });
        }
>>>>>>> 89b69c0e05ab31da5c5cfd824eabab8f8c31b4d3
    }
}
