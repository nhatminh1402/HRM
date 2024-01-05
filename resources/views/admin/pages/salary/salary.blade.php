@extends('admin.layouts.app')
@section('content')
    <div class="row">
        
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <!-- Breadcrumb navigation goes here -->
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h1">Danh sách nhân viên</h1>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <form action="">
                <button class="btn btn-success"> 
                    Xuất Excel<svg class="icon icon-xxs ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" /></svg></button>
            </form>
        </div>
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="input-group my-3 w-50">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="border-gray-200 text-center rounded-start">STT</th>
                                <th class="border-gray-200 text-center">Mã lương</th>
                                <th class="border-gray-200 text-center">Tên Nhân viên</th>
                                <th class="border-gray-200 text-center">Chức vụ</th>
                                <th class="border-gray-200 text-center">Lương tháng</th>
                                <th class="border-gray-200 text-center">Ngày công</th>
                                <th class="border-gray-200 text-center">Thục lãnh</th>
                                <th class="border-gray-200 text-center">Ngày chấm</th>
                                <th class="border-gray-200 text-center">Sửa</th>
                                <th class="border-gray-200 text-center rounded-end">Xóa</th>
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
                                <td class="text-center">
                                    <a href="" class="btn btn-warning">Sửa</a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
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
                                <td class="text-center">
                                    <a href="" class="btn btn-warning">Sửa</a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
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
                                <td class="text-center">
                                    <a href="" class="btn btn-warning">Sửa</a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
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
                                <td class="text-center">
                                    <a href="" class="btn btn-warning">Sửa</a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
