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
                'name' => 'Supper Admin'
            ],
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ],
        ];
        foreach ($data as $item) {
            Role::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
