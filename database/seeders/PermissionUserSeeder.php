<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Gate;

class PermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminPermissions = Permission::whereIn('name', ['access', 'create', 'update', 'delete', 'search', 'detail'])->pluck('id')->toArray();
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'Admin');
        })->get();

        foreach ($users as $user) {
            $user->permissions()->sync($adminPermissions);
        }

        $userPermissions = Permission::whereIn('name', ['access', 'update', 'detail'])->pluck('id')->toArray();
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'User');
        })->get();

        foreach ($users as $user) {
            $user->permissions()->sync($userPermissions);
        }
    }
}
