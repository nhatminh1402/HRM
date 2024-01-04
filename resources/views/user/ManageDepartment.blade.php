@extends('layouts.user.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Quản lý phòng ban')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p style="font-weight: bold; font-size: 17px !important" class="text-sm mb-0 text-capitalize">
                                PHÒNG NHÂN SỰ</p>
                            <h4 class="mb-0"></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">25 </span>nhân sự</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p style="font-weight: bold; font-size: 17px !important" class="text-sm mb-0 text-capitalize">
                                PHÒNG KẾ TOÁN</p>
                            <h4 class="mb-0"></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">10 </span>nhân sự</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
