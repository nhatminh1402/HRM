<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissioRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role) {

            if ($role->name === 'Supper Admin') {

                $permissions = Permission::pluck('id');

            } elseif ($role->name === 'Admin') {

                $permissions = Permission::whereIn('name', ['access', 'create', 'update', 'delete', 'search', 'detail'])->pluck('id');

                $users = User::where('role_id', $role->id)->pluck('id');

                foreach ($users as $userId) {

                    $user = User::find($userId);

                    $userPermissions = $user->createdBy ? Permission::whereIn('name', ['access', 'update', 'delete', 'search'])->pluck('id')

                        : Permission::whereIn('name', ['access', 'detail'])->pluck('id');

                    $user->permissions()->sync($userPermissions);
                }
            } elseif ($role->name === 'User') {

                $permissions = Permission::whereIn('name', ['access', 'detail', 'update'])->pluck('id');

            } else {

                $permissions = Permission::whereIn('name', ['access', 'detail'])->pluck('id');
            }

            $role->permissions()->sync($permissions);
        }
    }
}
