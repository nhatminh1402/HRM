<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ],
            [
                'name' => 'Supper Admin'
            ]
        ];
        foreach ($data as $item) {
            Role::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
