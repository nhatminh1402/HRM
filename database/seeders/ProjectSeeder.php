<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Huế '
            ],
            [
                'name' => 'Dự án quản lý nhân sự',
                'description' => 'Dự án trung tâm Đà Nẵng'
            ],
            [
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Hồ Chí Minh'
            ],
            [
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Quảng Nam'
            ]
        ];
        foreach ($data as $item) {
            Project::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
