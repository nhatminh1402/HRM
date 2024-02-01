@extends('admin.layouts.app')

@section('title', 'Create Account')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/create-account.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h2 class="mb-4 pb-2 border-bottom text-primary">Tạo tài khoản</h2>
    <form action="">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="image" class="form-label mb-2 font-weight-bold">Chọn ảnh:</label>
                <input type="file" class="form-control" id="image" name="image"  value="">
            </div>
            <div class="col-12 mb-3">
                <label for="gender" class="form-label mb-2 font-weight-bold">Chọn nhân viên<span
                        class="text-danger">*</span>:</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn nhân viên--</option>
                    <option value="phuoc">Nguyễn Phước</option>
                    <option value="minh">Nguyễn Minh</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="full_name" class="form-label mb-2 font-weight-bold">Họ tên<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ tên">
            </div>
            <div class="col-12 mb-3">
                <label for="email" class="form-label mb-2 font-weight-bold">Email<span class="text-danger">*</span>:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập họ tên">
            </div>
            <div class="col-12 mb-3">
                <label for="password" class="form-label mb-2 font-weight-bold">Mật khẩu<span class="text-danger">*</span>:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập họ tên">
            </div>
            <div class="col-12 mb-3">
                <label for="re-password" class="form-label mb-2 font-weight-bold">Nhập lại mật khẩu<span class="text-danger">*</span>:</label>
                <input type="re-password" class="form-control" id="re-password" name="re-password" placeholder="Nhập họ tên">
            </div>
            <div class="col-12 mb-3">
                <label for="phone_number" class="form-label mb-2 font-weight-bold">Số điện thoại<span class="text-danger">*</span>:</label>
                <input type="phone_number" class="form-control" id="phone_number" name="phone_number" placeholder="Nhập họ tên">
            </div>
            <div class="mb-3 row">
                <label for="permission" class="col-sm-2 col-form-label">Quyền hạn:</label>
                <div class="col-sm-10 d-flex align-items-center option">
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input mr-2" type="radio" name="employee" id="admin"
                            value="admin" checked>
                        <label class="form-check-label" for="admin">Quản trị viên</label>
                    </div>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input mr-2" type="radio" name="employee" id="user"
                            value="user">
                        <label class="form-check-label" for="user">Nhân viên</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="permission" class="col-sm-2 col-form-label">Trạng thái:</label>
                <div class="col-sm-10 d-flex align-items-center option">
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input mr-2" type="radio" name="status" id="active"
                            value="active" checked>
                        <label class="form-check-label" for="admin">Đang họat động</label>
                    </div>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input mr-2" type="radio" name="status" id="unactive"
                            value="unactive">
                        <label class="form-check-label" for="user">Không hoạt động</label>
                    </div>
                </div>
            </div>

        </div>
        <button class="btn btn-success">Tạo tài khoản mới</button>
    </form>

@endsection
