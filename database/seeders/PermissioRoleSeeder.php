<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as ModelsRole;

class PermissioRoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissionsAdmin = Permission::whereIn('name', ['access', 'create', 'update', 'delete', 'search', 'detail'])->pluck('id');
        $roleAdmin = Role::where('name', ['Admin'])->first();
        $roleAdmin->permissions()->sync($permissionsAdmin->toArray());
        $permissionsUser = Permission::whereIn('name', ['access', 'update', 'detail'])->pluck('id');
        $roleAdmin = Role::where('name', 'User')->first();
        $roleAdmin->permissions()->sync($permissionsUser->toArray());
    }
}
