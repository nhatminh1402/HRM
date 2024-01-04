@extends('user.layouts.base')

{{-- Thêm script file ở head --}}
@section('include-script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('material-template/assets/css/user/account_infor.css') }}">
@endsection

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin tài khoản')

@section('breadcrumb-item-after', 'Tài khoản')
@section('breadcrumb-item-before', 'Thông tin tài khoản cá nhân')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">ẢNH ĐẠI DIỆN</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">CHI TIẾT TÀI KHOẢN</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Chọn file nếu muốn cập nhật (*)</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1">Họ tên</label>
                                <input class="form-control" type="text" value="Le Ba Nhat Minh">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control" type="text" value="nhatminhle1402@gmail.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1">Số điện thoại liên hệ</label>
                                    <input class="form-control" type="text" value="0352792997">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Ngày sinh</label>
                                    <input class="form-control" type="text" value="14/02/2002">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Địa chỉ</label>
                                    <input class="form-control" type="text" value="Thừa Thiên Huế">
                                </div>
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
