@extends('admin.layouts.app')

@section('title', 'Account Information')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/account-info.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin tài khoản</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mr-2">
                <table class="table table-hover">
                    <div class="image-account mb-4">
                        <img class="d-flex image-lg rounded-border" alt="Image placeholder"
                            src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                    </div>
                    <tbody>
                        <tr>
                            <td>Lượt truy cập:</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo:</td>
                        </tr>
                        <tr>
                            <td>Ngày sửa:</td>
                        </tr>
                        <tr>
                            <td>Trạng thái: <span class="float-lg-end text-primary">Đang làm việc</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-8">
                <form action="">
                    <h5 class="mb-4 pb-2 border-bottom text-primary">Thay đổi thông tin</h2>
                        <div class="mb-3 row">
                            <label for="image" class="col-sm-2 col-form-label">Chọn ảnh: </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="code_employee" class="col-sm-2 col-form-label">Mã nhân viên<span
                                    class="text-danger">*</span>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="code_employee" name="code_employee">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="first_name" class="col-sm-2 col-form-label">Họ<span
                                    class="text-danger">*</span>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Tên<span
                                    class="text-danger">*</span>:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone_number" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="phone_number" name="phone_number">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="permission" class="col-sm-2 col-form-label">Quyền hạn</label>
                            <div class="col-sm-10 d-flex align-items-center">
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
                            <label for="permission" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10 d-flex align-items-center">
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
                        <button class="btn btn-primary">Lưu lại</button>
                </form>
            </div>
        </div>
    @endsection
