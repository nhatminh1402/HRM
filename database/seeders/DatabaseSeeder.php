<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissioRoleSeeder::class,
            PermissionUserSeeder::class,
            DepartmentSeeder::class,
            ProjectSeeder::class,
            ProjectEmplyeeSeeder::class,
        ]);
    }
}
