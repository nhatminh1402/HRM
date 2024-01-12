<?php

namespace Database\Seeders;

use App\Helpers;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code_position' => Helpers::generateEmployeeCode('MCV'),
                'name' => 'Giám đốc kinh doan',
                'description' => "Quản lý khu vực 22",
                'salary_day' => '2000000'
            ],
            [
                'code_position' => Helpers::generateEmployeeCode('MCV'),
                'name' => 'Trưởng phòng kinh doan',
                'description' => "Quản lý khu vực 21",
                'salary_day' => '1000000'
            ],
            [
                'code_position' => Helpers::generateEmployeeCode('MCV'),
                'name' => 'Tổng giám đốc',
                'description' => "Quản lý khu vực 2",
                'salary_day' => '3000000'
            ],
        ];
        foreach ($data as $item) {
            Position::updateOrCreate([
                'code_position' => $item['code_position'],
                'name' => $item['name'],
                'description' => $item['description'],
                'salary_day' => $item['salary_day'],
            ], $item);
        }
    }
}
