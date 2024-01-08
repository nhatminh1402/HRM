@extends('user.layouts.base')

{{-- Thêm script file ở head --}}
@section('include-script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Đổi mật khẩu')

@section('breadcrumb-item-after', 'Tài khoản')
@section('breadcrumb-item-before', 'Đổi mật khẩu')

@section('content')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">CẬP NHẬT MẬT KHẨU</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="small mb-1">Mật khẩu hiện tại</label>
                                <input class="form-control" type="passowrd">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1">Mật khẩu mới</label>
                                <input class="form-control" type="passowrd">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1">Xác nhận mật khẩu</label>
                                <input class="form-control" type="passowrd">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
