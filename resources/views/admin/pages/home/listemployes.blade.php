@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách nhân viên </h3>
            </div>
        </div>
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start text-center">STT</th>
                                <th class="border-0  text-center">Mã nhân viên</th>
                                <th class="border-0  text-center">Ảnh</th>
                                <th class="border-0  text-center">Tên nhân viên</th>
                                <th class="border-0  text-center">Giới tính</th>
                                <th class="border-0  text-center">Ngày sinh</th>
                                <th class="border-0  text-center rounded-end">Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='text-center'>1</td>
                                <td class='text-center'>NV001</td>
                                <td class='text-center'>
                                    <img class="image image-md" alt="Image placeholder"
                                        src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                </td>
                                <td class='text-center'>John Doe</td>
                                <td class='text-center'>Nam</td>
                                <td class='text-center'>1990-01-01</td>
                                <td class='text-center'>Đang làm việc</td>
                            </tr>
                            <tr>
                                <td class='text-center'>2</td>
                                <td class='text-center'>NV002</td>
                                <td class='text-center'>
                                    <img class="image image-md" alt="Image placeholder"
                                        src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                </td>
                                <td class='text-center'>Jane Smith</td>
                                <td class='text-center'>Nữ</td>
                                <td class='text-center'>1995-05-10</td>
                                <td class='text-center'>Đang nghỉ</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
