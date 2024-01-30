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
                <div class="card-body px-0 pb-2">
                    <div class="row">
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
                                                        Tháng 
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Mã lương
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Chức vụ</th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Ngày công</th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Lương cơ bản</th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Thực nhận</th>
                                                    <th
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Thời gian tính lương</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($userSalary->isEmpty())
                                                    <td>
                                                        <h6 style="text-align: center" class="mb-0 text-sm">
                                                            không có lương nhân viên
                                                        </h6>
                                                    </td>
                                                @else
                                                    @foreach ($userSalary as $salary)
                                                        <tr>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    Tháng {{ $salary->month}} năm {{ $salary->year}}
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ $salary->code_salary }}
                                                                </h6>
                                                            </td>
                                                            <td class="align-middle">
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ $salary->employee->position->name }}
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ $salary->workday }}
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ number_format($salary->employee->basic_salary, 0, '', ',') . ' VNĐ' }}
                                                            </td>
                                                            </h6>
                                                            </td>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ number_format($salary->real_leaders, 0, '', ',') . ' VNĐ' }}
                                                            </td>
                                                            </h6>
                                                            </td>
                                                            <td>
                                                                <h6 style="text-align: center" class="mb-0 text-sm">
                                                                    {{ date_format($salary->created_at, 'd-m-Y') }}
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
