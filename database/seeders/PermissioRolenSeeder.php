<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissioRolenSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role) {
            if ($role->name === 'Admin' || $role->name === 'Supper Admin'  ) {
                $permissions = Permission::whereIn('name', ['access', 'create', 'update','delete', 'search', 'detail'])->pluck('id');
            } elseif ($role->name === 'User') {
                $permissions = Permission::whereIn('name', ['access', 'search', 'detail', 'update'])->pluck('id');
            } else {
                $permissions = Permission::pluck('id');
            }

            $role->permissions()->sync($permissions);
        }
    }
}
