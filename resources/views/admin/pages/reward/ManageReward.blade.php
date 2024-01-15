@extends('admin.layouts.app')
@section('title', 'QUẢN LÝ KHEN THƯỞNG')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="row border-bottom">
                    <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                        <p style="font-size: 22px; font-weight: bold" class="mb-0 text-center  text-lg-start">QUẢN LÝ KHEN
                            THƯỞNG
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="c">
                        <h1 class="pt-3" style="font-size: 16px">THAO TÁC CHỨC NĂNG</h1>
                    </div>
                    <div>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">weekend</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                                        <h4 class="mb-0">$53k</h4>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                        last week</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
