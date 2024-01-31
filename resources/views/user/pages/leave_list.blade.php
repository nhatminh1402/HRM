@extends('user.layouts.base')

{{-- Định nghĩa breadcrumb --}}
@section('breadcrumb-item-after', 'Nghỉ phép')
@section('breadcrumb-item-before', 'Ngày phép')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Leave')

{{-- Đinh nghĩa nội dung cho trang hiển thị thông tin cá nhân ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Bảng ngày phép và đơn xin phép</h6>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('user.leave.add') }}">Thêm ngày phép</a>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="8">
                                            <div class="input-group input-group-outline row">
                                                <div class="col-md-9">
                                                </div>
                                                <div class="row">
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NO.</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            TÊN NHÂN VIÊN</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            NGÀY TẠO PHÉP</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            TRẠNG THÁI</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            XEM CHI TIẾT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($leaves->isEmpty())
                                        <td colspan="9" class="text-lg-center w-100">Không thấy đơn nào ở đây
                                            !</td>
                                    @else
                                        @foreach ($leaves as $key => $leave)
                                            <tr>
                                                <td class="text-center">
                                                    <h6 style="margin-left: 20px" class="mb-0">{{ $key + 1 }}</h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6 style="margin-left: 20px" class="mb-0">{{ $leave->employee->full_name }}
                                                    </h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6 style="margin-left: 20px" class="mb-0">
                                                        {{ $leave->created_at->format('Y-m-d') }}</h6>
                                                </td>
                                                <td class="text-center">
                                                    <h6 style="margin-left: 20px" class="mb-0">
                                                        @if ($leave->status == 0)
                                                            <span class="badge badge-sm bg-gradient-warning">Đang chờ</span>
                                                        @elseif ($leave->status == 1)
                                                            <span class="badge badge-sm bg-gradient-success">Đã duyệt</span>
                                                        @elseif ($leave->status == 2)
                                                            <span class="badge badge-sm bg-gradient-danger">Không duyệt</span>
                                                        @endif
                                                    </h6>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('user.leave.detailEmail', $leave->id ) }}" class="">
                                                        <i class="material-icons opacity-10">border_color</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $leaves->links() }}
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    @endsection
