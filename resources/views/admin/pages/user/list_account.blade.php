@extends('admin.layouts.app')

@section('title', 'List Account')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/list-account.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Danh sách tài khoản </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card card-body shadow border-0 table-wrapper table-responsive">
                            <table class="table user-table table-hover align-items-center ">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Ảnh</th>
                                        <th class="text-center">Họ và tên</th>
                                        <th class="text-center">Mã nhân viên</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Truy cập</th>
                                        <th class="text-center">Điện thoại</th>
                                        <th class="text-center">Quyền hạn</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Sửa</th>
                                        <th class="text-center">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center align-items-center">
                                            <img alt="Image placeholder"
                                                src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                        </td>
                                        <td class="text-center">Nguyễn Phước</td>
                                        <td class="text-center">MNV121212121</td>
                                        <td class="text-center">nguyenphuoc@gmail.com</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0905953684</td>
                                        <td class="text-center">
                                            <span class="bg-primary text-white p-2 small font-weight-bold">Nhân viên</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="bg-success text-white p-2 small font-weight-bold">Đang hoạt
                                                động</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-warning p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                                                24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4
                                                                6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15
                                                                19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                                                22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1
                                                                373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0
                                                                88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40
                                                                40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-danger p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center align-items-center">
                                            <img alt="Image placeholder"
                                                src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                        </td>
                                        <td class="text-center">Nguyễn Phước</td>
                                        <td class="text-center">MNV121212121</td>
                                        <td class="text-center">nguyenphuoc@gmail.com</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0905953684</td>
                                        <td class="text-center">
                                            <span class="bg-primary text-white p-2 small font-weight-bold">Nhân viên</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="bg-success text-white p-2 small font-weight-bold">Đang hoạt
                                                động</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-warning p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                                                24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4
                                                                6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15
                                                                19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                                                22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1
                                                                373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0
                                                                88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40
                                                                40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-danger p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center align-items-center">
                                            <img alt="Image placeholder"
                                                src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                        </td>
                                        <td class="text-center">Nguyễn Phước</td>
                                        <td class="text-center">MNV121212121</td>
                                        <td class="text-center">nguyenphuoc@gmail.com</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0905953684</td>
                                        <td class="text-center">
                                            <span class="bg-primary text-white p-2 small font-weight-bold">Nhân viên</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="bg-success text-white p-2 small font-weight-bold">Đang hoạt
                                                động</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-warning p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                                                24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4
                                                                6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15
                                                                19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                                                22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1
                                                                373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0
                                                                88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40
                                                                40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <span class="d-inline-block bg-danger p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="#fff" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
