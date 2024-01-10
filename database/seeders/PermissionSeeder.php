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
                'display_name' => 'Được truy cập vào trang này.'
            ],

            [
                'name' => 'create',
                'display_name' => 'Được thêm mới nội dung trang này.'
            ],

            [
                'name' => 'update',
                'display_name' => 'Được chỉnh sửa nội dung trang này.'
            ],

            [
                'name' => 'delete',
                'display_name' => 'Được xóa nội dung trang này.'
            ],

            [
                'name' => 'search',
                'display_name' => 'Được tìm kiếm nội dung trang này.'
            ],

            [
                'name' => 'detail',
                'display_name' => 'Được xem chi tiết nội dung trang này.'
            ],
        ];

        foreach ($data as $item) {
            Permission::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
