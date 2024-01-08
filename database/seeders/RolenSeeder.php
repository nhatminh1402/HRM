<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolenSeeder extends Seeder
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
        Role::insert($data);
    }
}
