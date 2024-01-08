<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'access',
            ],

            [
                'name' => 'create'
            ],

            [
                'name' => 'update'
            ],

            [
                'name' => 'delete'
            ],

            [
                'name' => 'search'
            ],

            [
                'name' => 'detail'
            ],
        ];
        Permission::insert($data);
    }
}
