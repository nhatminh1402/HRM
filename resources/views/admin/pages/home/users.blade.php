@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            @if (session('msg'))
                <div class=" alert alert-danger h6 mb-4">{{ session('msg') }}</div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Danh sách tài khoản </h2>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card card-body shadow border-0 table-wrapper table-responsive">

                            <table class="table user-table table-hover align-items-center ">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom"></th>
                                        <th class="border-bottom">Họ và tên</th>
                                        <th class="border-bottom">Mã nhân viên</th>
                                        <th class="border-bottom">Điện thoại</th>
                                        <th class="border-bottom">Trạng Thái</th>
                                        <th class="border-bottom">Quyền</th>
                                        <th class="border-bottom">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><img class="me-2 rounded-circle" alt="Image placeholder"
                                                src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg"
                                                style="width:2rem; height:2rem;"></td>
                                        <td>

                                            <a href="#" class="d-flex align-items-center">

                                                <div class="d-block">
                                                    <span class="fw-bold h6">  Trương Văn Phước  </span>
                                                    <div class="small text-gray"> admin@gmail.com </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td><span class="fw-normal"> DEHA123123 </span></td>
                                        <td>

                                            <span class="fw-normal d-flex align-items-center"> 01230123 </span>
                                        </td>
                                        <td><span class="fw-normal text-success"> Online </span></td>
                                        <td><span class="fw-normal text-danger"> admin </span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button
                                                    class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                                    <a class="dropdown-item d-flex align-items-center" href="">
                                                        <span class="fas fa-user-shield me-2"></span>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item text-danger d-flex align-items-center"
                                                        href="">
                                                        <span class="fas fa-user-times me-2"></span>
                                                        Delete user
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
