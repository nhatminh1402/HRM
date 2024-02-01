@extends('user.layouts.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Kỷ luật')

@section('breadcrumb-item-after', 'Danh sách lịch sử bị kỷ luật')
@section('breadcrumb-item-before', '')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">DANH SÁCH LỊCH SỬ BỊ KỶ LUẬT</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th colspan="8">
                                        <div class="input-group input-group-outline row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" onfocus="focused(this)"
                                                    onfocusout="defocused(this)" placeholder="Search">
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        MÃ KỶ LUẬT</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NỘI DUNG KỶ LUẬT</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TÊN NHÂN VIÊN</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NGÀY RA QUYẾT ĐỊNH</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NGÀY THỰC THI</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        SỐ TIỀN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0">MNV20646468</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">Đạt KPI tháng 8</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">Lê Bá Nhật Minh</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">12/08/2022</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">20/08/2022</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0"><span class="text-danger">1.500.000</span> vnd</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0">MNV20646468</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">Đạt KPI tháng 9</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">Lê Bá Nhật Minh</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">12/09/2022</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0">20/09/2022</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0 "> <span class="text-danger">1.500.000</span> vnd</h6>
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
