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
                'code_project' => 'MDA123457891',
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Huế '
            ],
            [
                'code_project' => 'MDA123467891',
                'name' => 'Dự án quản lý nhân sự',
                'description' => 'Dự án trung tâm Đà Nẵng'
            ],
            [
                'code_project' => 'MDA138567891',
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Hồ Chí Minh'
            ],
            [
                'code_project' => 'MDA2834867491',
                'name' => 'Dự án bán hàng TTTM',
                'description' => 'Dự án trung tâm Quảng Nam'
            ]
        ];
        
        foreach ($data as $item) {
            Project::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
