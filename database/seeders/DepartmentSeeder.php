<?php

namespace Database\Seeders;
use App\Helpers;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code_department' => Helpers::generateCode('MPB'),
                'name' => 'Nhân viên HR',
                'description' => "Quản lý khu vực 22",

            ],
            [
                'code_department' => Helpers::generateCode('MPB'),
                'name' => 'Phát triên web',
                'description' => "Quản lý khu vực 21",

            ],
            [
                'code_department' => Helpers::generateCode('MPB'),
                'name' => 'Nhân viên phát triển AI',
                'description' => "Quản lý khu vực 2",

            ],
        ];
        foreach ($data as $item) {
            Department::updateOrCreate([
                'code_department' => $item['code_department'],
                'name' => $item['name'],
                'description' => $item['description'],
            ], $item);
        }
    }
}
