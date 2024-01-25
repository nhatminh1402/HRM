@extends('user.layouts.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Lương cá nhân')

@section('breadcrumb-item-after', 'Lương cá nhân')
@section('breadcrumb-item-before', 'Xem chi tiết')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
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
                        <h6 class="text-white text-capitalize ps-3">BẢNG LƯƠNG CÁ NHÂN</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mã lương
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Lương ngày</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ngày công</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Lương tháng</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Phụ cấp</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Khoản nộp</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tạm ứng</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Thực lãnh</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ngày chấm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            ML63636373
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            300.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            29
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            5.000.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            4.000.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            22/02/2023
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            ML74646746
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            230.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            29
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            7.000.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            0
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            5.000.000 VND
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                            22/02/2023
                                        </h6>
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
