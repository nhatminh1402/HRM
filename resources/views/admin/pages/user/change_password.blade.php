@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin tài khoản</h2>
    <div class="container">
        <div class="row bg-white">
            <div class="col-sm-3 mr-3">
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
                    <h5 class="mb-4 pb-2 border-bottom text-primary">Đổi mật khẩu</h5>
                    <div class="mb-4 row">
                        <label for="code_employee" class="col-sm-2 col-form-label col-form-label-sm font-weight-bold">Nhập
                            mật khẩu cũ<span class="text-danger">*</span>:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code_employee" name="code_employee"
                                placeholder="Nhập mật khẩu cũ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="code_employee" class="col-sm-2 col-form-label col-form-label-sm font-weight-bold">Nhập
                            mật khẩu mới<span class="text-danger">*</span>:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code_employee" name="code_employee"
                                placeholder="Nhập mật khẩu mới">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="first_name" class="col-sm-2 col-form-label col-form-label-sm font-weight-bold">Nhập lại
                            mật khẩu mới<span class="text-danger">*</span>:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                    <button class="btn btn-primary">Lưu lại</button>
                </form>
            </div>
        </div>
    @endsection
