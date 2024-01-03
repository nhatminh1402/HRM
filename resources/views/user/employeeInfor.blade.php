@extends('layouts.user.base')

{{-- Định nghĩa breadcrumb --}}
@section('breadcrumb-item-after', 'Tài khoản cá nhân')
@section('breadcrumb-item-before', 'Thông tin cá nhân')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin cá nhân')

{{-- Đinh nghĩa nội dung cho trang hiển thị thông tin cá nhân ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Thông tin nhân viên</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="img-avatar" style="padding: 20px; text-align:center">
                                <img style="width: 95%" src=" {{ asset('material-template/assets/img/img_avatar.png') }} "
                                    alt="">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">MÃ NHÂN VIÊN : MNV333120461
                                            </h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:;">
                                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile"
                                                    data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit
                                                    Profile</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                        class="text-dark">Tên nhân viên:</strong>&nbsp;Lê Bá Nhật Minh</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Giới tính:</strong>&nbsp;Nam</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Ngày sinh:</strong>&nbsp;14/02/2002</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Số CMND:</strong> &nbsp;123456712345</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Địa chỉ:</strong> &nbsp;Thừa Thiên Huế</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Quốc tịch:</strong> &nbsp;VN</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Tôn giáo:</strong> &nbsp;Không</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Dân tộc:</strong> &nbsp;Kinh</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Số điện thoại:</strong> &nbsp; 035 279 2997</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Email:</strong> &nbsp; nhatminhle1402@gmail.com
                                                </li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Trình độ:</strong>&nbsp; Đại học
                                                </li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Chuyên nghành:</strong>&nbsp; Công nghệ thông tin
                                                </li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Loại nhân viên:</strong>&nbsp; Thực tập sinh
                                                </li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Thuộc phòng ban:</strong>&nbsp; Phòng lập trình
                                                    ứng dụng web
                                                </li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Trạng thái: </strong>&nbsp; <span
                                                        class="badge badge-sm bg-gradient-success">Đang làm việc</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lịch sử làm việc</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày gia
                                        nhập/nhận chức
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ngày kết thúc</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Vị trí đảm nhiệm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Mức lương</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                    12/02/2002
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">

                                        <span class="me-2 text-xs font-weight-bold">06/02/2023</span>

                                    </td>
                                    <td>
                                        <span class="me-2 text-xs font-weight-bold">Thực tập sinh</span>

                                    </td>
                                    <td>
                                        <span class="me-2 text-xs font-weight-bold">KHÔNG</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                    07/02/2003
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="me-2 text-xs font-weight-bold">Đang đảm nhiệm</span>
                                    </td>
                                    <td>
                                        <span class="me-2 text-xs font-weight-bold">Thực tập sinh</span>

                                    </td>
                                    <td>
                                        <span class="me-2 text-xs font-weight-bold">KHÔNG</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
