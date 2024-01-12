@extends('admin.layouts.app')

@section('title', 'Create Employeee')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('material-template/assets/css/user/account_infor.css') }}">
    <style>
        #upload-img-area {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thêm mới nhân viên</h2>
    <form action="">
        <div class="container-fluid">
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card">
                            <div class="card-header">ẢNH ĐẠI DIỆN</div>
                            {{-- Hidden input to select file  --}}
                            <input id="file-field" type="file" class="form-control" id="image" name="img-upload"
                                hidden>
                            <div id="upload-img-area" class="card-body text-center" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="CLICK ĐỂ UPLOAD ẢNH">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2"
                                    src="{{ asset('uploads\1704871719-img.jpg') }}" alt="">
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
                                    <button type="submit" class="btn btn-primary" type="button">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>2024,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative
                                        Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/create_employee.js') }}"></script>
@endsection
