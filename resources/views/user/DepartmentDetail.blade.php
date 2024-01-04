@extends('layouts.user.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Chi tiết phòng ban')

@section('breadcrumb-item-after', 'Quản lý phòng ban')
@section('breadcrumb-item-before', 'Thông tin chi tiết')


{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">PHÒNG PHÁT TRIỂN ỨNG DỤNG WEB</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        MÃ NHÂN VIÊN</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ẢNH</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TÊN NHÂN VIÊN</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        GIỚI TÍNH</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NGÀY SINH</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CHỨC VỤ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NGÀY GIA NHẬP</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TRẠNG THÁI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">MNV20646468</h6>
                                    </td>
                                    <td>
                                        <div style="width: 100%; text-align: center">
                                            <img style="width: 60%; height: 150px"
                                                src=" {{ asset('material-template/assets/img/img_avatar.png') }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Lê Bá Nhật Minh</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Nam</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">14/02/2002</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Thực tập sinh</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">05/02/2003</h6>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Đang làm việc</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">MNV20674676</h6>
                                    </td>
                                    <td>
                                        <div style="width: 100%; text-align: center">
                                            <img style="width: 60%; height: 150px"
                                                src=" {{ asset('material-template/assets/img/img_avatar.png') }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Lê Thị B</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Nữ</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">04/02/2001</h6>
                                    </td>
                                    <td>
                                        <h6 style="margin-left: 20px" class="mb-0">Developer</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">05/02/2021</h6>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Đang làm việc</span>
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
