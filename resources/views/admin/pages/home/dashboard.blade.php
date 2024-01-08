@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h3 class="h3"> Tổng quan </h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    </nav>
                    <h2 class="h4">Danh sách phòng ban</h2>
                </div>
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search orders">
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200">STT</th>
                            <th class="border-gray-200">Mã phòng</th>
                            <th class="border-gray-200">Tên phòng</th>
                            <th class="border-gray-200">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td>
                                <a href="#" class="fw-bold">
                                    456478
                                </a>
                            </td>
                            <td>
                                <span class="fw-normal">Platinum Subscription Plan</span>
                            </td>
                            <td><span class="fw-normal">1 May 2020</span></td>
                            <td><span class="fw-normal">1 Jun 2020</span></td>

                        </tr>
                        <!-- Item -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    </nav>
                    <h2 class="h4">Danh sách chức vụ</h2>
                </div>
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search orders">
                </div>
                <table class="table table-hover">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="border-gray-200">STT</th>
                                <th class="border-gray-200">Mã phòng</th>
                                <th class="border-gray-200">Tên phòng</th>
                                <th class="border-gray-200">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Item -->
                            <tr>
                                <td>
                                    <a href="#" class="fw-bold">
                                        456478
                                    </a>
                                </td>
                                <td>
                                    <span class="fw-normal">Platinum Subscription Plan</span>
                                </td>
                                <td><span class="fw-normal">1 May 2020</span></td>
                                <td><span class="fw-normal">1 Jun 2020</span></td>

                            </tr>
                            <!-- Item -->

                        </tbody>
                    </table>
                </table>

            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                </nav>
                <h2 class="h4">Danh sách lương tháng </h2>
            </div>
            <div class="input-group me-2 me-lg-3 fmxw-400">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Search orders">
            </div>
            <table class="table table-hover">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200">STT</th>
                            <th class="border-gray-200">Mã phòng</th>
                            <th class="border-gray-200">Tên phòng</th>
                            <th class="border-gray-200">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td>
                                <a href="#" class="fw-bold">
                                    456478
                                </a>
                            </td>
                            <td>
                                <span class="fw-normal">Platinum Subscription Plan</span>
                            </td>
                            <td><span class="fw-normal">1 May 2020</span></td>
                            <td><span class="fw-normal">1 Jun 2020</span></td>

                        </tr>
                        <!-- Item -->

                    </tbody>
                </table>
            </table>

        </div>
    </div>

</div>
@endsection


