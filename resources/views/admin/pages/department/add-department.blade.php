@extends('admin.layouts.app')
@section('title', 'Add Department')
@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Tạo phòng ban</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code" class="form-label mb-2 font-weight-bold" value="{{ old('code') }}">Mã phòng ban
                    </label>
                    <input type="text" name="code" class="form-control" id="code">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Tên phòng
                        ban</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold" value="{{ old('date') }}">Ngày
                        tạo</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success"> <svg class="icon icon-xs me-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>Thêm phòng ban</button>
            </form>
        </div>
    </div>
    <div class="row ml-4">
        <h2 class="mb-4 pb-2  text-primary">Phòng ban</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã phòng ban</th>
                            <th class="border-0  text-center">Tên phòng ban</th>
                            <th class="border-0  text-center">Mô tả</th>
                            <th class="border-0  text-center">Người tạo</th>
                            <th class="border-0  text-center">Ngày tạo</th>
                            <th class="border-0  text-center">Ngày sửa</th>
                            <th class="border-0  text-center">Sửa</th>
                            <th class="border-0  text-center rounded-end">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>PB2153232001</td>
                            <td class='text-center'>Nhân viên HR</td>
                            <td class='text-center'>Đảm nhiệm quản luý nhân viên</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>


                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>

                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>PB2153232001</td>
                            <td class='text-center'>Nhân viên HR</td>
                            <td class='text-center'>Đảm nhiệm quản lý nhân viên</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>


                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>

                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>PB2153232001</td>
                            <td class='text-center'>Nhân viên HR</td>
                            <td class='text-center'>Đảm nhiệm quản lý nhân viên</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>


                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
