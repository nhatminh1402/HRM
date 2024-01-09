@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3"> Tổng quan </h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

                <div class="card card-body border-0 shadow table-wrapper table-responsive">
                    <div class="d-block mb-4 mb-md-0">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        </nav>
                        <h2 class="h4">Danh sách phòng ban</h2>
                    </div>
                    <div class="input-group me-2 me-lg-3 fmxw-400">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search orders">
                    </div>
                    <table class="table table-hover">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 text-center">STT</th>
                                    <th class="border-0 text-center">Mã phòng</th>
                                    <th class="border-0 text-center">Tên phòng</th>
                                    <th class="border-0 text-center">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-0 text-center">1</td>
                                    <td class="border-0 text-center">A001</td>
                                    <td class="border-0 text-center">Phòng A</td>
                                    <td class="border-0 text-center">2022-01-01</td>
                                </tr>
                                <tr>
                                    <td class="border-0 text-center">2</td>
                                    <td class="border-0 text-center">B002</td>
                                    <td class="border-0 text-center">Phòng B</td>
                                    <td class="border-0 text-center">2022-02-01</td>
                                </tr>
                                <tr>
                                    <td class="border-0 text-center">3</td>
                                    <td class="border-0 text-center">C003</td>
                                    <td class="border-0 text-center">Phòng C</td>
                                    <td class="border-0 text-center">2022-03-01</td>
                                </tr>
                                <!-- Thêm các dòng dữ liệu khác tương tự -->
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

                <div class="card card-body border-0 shadow table-wrapper table-responsive">
                    <div class="d-block mb-4 mb-md-0">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        </nav>
                        <h2 class="h4">Danh sách chức vụ</h2>
                    </div>
                    <div class="input-group me-2 me-lg-3 fmxw-400">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search orders">
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start text-center">STT</th>
                                <th class="border-0  text-center">Mã chức vụ</th>
                                <th class="border-0  text-center">Tên chức vụ</th>
                                <th class="border-0  text-center">Lương ngày</th>
                                <th class="border-0  text-center">Mô tả</th>
                                <th class="border-0  text-center">Người tạo</th>
                                <th class="border-0  text-center">Ngày tạo</th>
                                <th class="border-0  text-center">Người sửa</th>
                                <th class="border-0  text-center">Ngày sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='text-center'>1</td>
                                <td class='text-center'>MCV2153232001</td>
                                <td class='text-center'>Phó giám đốc</td>
                                <td class='text-center'>560, 000đ</td>
                                <td class='text-center'>Giám đốc kinh doanh</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>
                            </tr>
                            <tr>
                                <td class='text-center'>2</td>
                                <td class='text-center'>MCV2153232001</td>
                                <td class='text-center'>Phó giám đốc</td>
                                <td class='text-center'>560, 000đ</td>
                                <td class='text-center'>Giám đốc kinh doanh</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>


                            </tr>
                            <tr>
                                <td class='text-center'>3</td>
                                <td class='text-center'>MCV2153232001</td>
                                <td class='text-center'>Phó giám đốc</td>
                                <td class='text-center'>560, 000đ</td>
                                <td class='text-center'>Giám đốc kinh doanh</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>
                                <td class='text-center'>Admin</td>
                                <td class='text-center'>2024-01-01 01:10:10</td>

                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    </nav>
                    <h2 class="h4">Danh sách lương tháng </h2>
                </div>
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search orders">
                </div>
                <table class="table table-hover">
                    <table class="table table-hover">
                        <table class="table table-hover">
                            <thead class="thead-light" >
                                <tr>
                                    <th class="border-gray-200 text-center rounded-start">STT</th>
                                    <th class="border-gray-200 text-center">Mã lương</th>
                                    <th class="border-gray-200 text-center">Tên Nhân viên</th>
                                    <th class="border-gray-200 text-center">Chức vụ</th>
                                    <th class="border-gray-200 text-center">Lương tháng</th>
                                    <th class="border-gray-200 text-center">Ngày công</th>
                                    <th class="border-gray-200 text-center">Thục lãnh</th>
                                    <th class="border-gray-200 text-center">Ngày chấm</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                   
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                   
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </table>
                </table>

            </div>
        </div>

    </div>
@endsection
