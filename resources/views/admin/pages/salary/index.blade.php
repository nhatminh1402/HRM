@extends('admin.layouts.app')

@section('title', 'Show Salary')

@section('css')

@endsection

@section('content')
    <div class="row shadow">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <!-- Breadcrumb navigation goes here -->
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mt-4 mb-2">
            <div class="mb-3 mb-lg-0">
                <h2 class="h2 mb-2">Danh sách lương nhân viên</h2>
            </div>
        </div>
        <div class="col-12 mb-2 d-flex justify-content-between">
            <a href="/admin/salary/export?key={{ request()->key }}">
                <button class="btn btn-success text-white">
                    Xuất Excel<svg class="icon icon-xxs ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                            clip-rule="evenodd" />
                    </svg></button>
            </a>
            <form class="navbar-search w-25 mb-4" id="navbar-search-main" action="{{ route('admin.salary.search') }}"
                method="GET">
                <div class="input-group input-group-merge search-bar">
                    <span class="input-group-text" id="topbar-addon">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" name="key" value="{{ request()->key }}" class="form-control"
                        id="topbarInputIconLeft" placeholder="Tìm kiếm theo tên chức vụ" aria-label="Search"
                        aria-describedby="topbar-addon">
                </div>
            </form>
        </div>
        <div class="card shadow border-0">
            <div class="card-body border-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="border-gray-200 text-center rounded-start">STT</th>
                                <th class="border-gray-200 text-start">Mã lương</th>
                                <th class="border-gray-200 text-start">Tên Nhân viên</th>
                                <th class="border-gray-200 text-start">Chức vụ</th>
                                <th class="border-gray-200 text-start">Lương tháng</th>
                                <th class="border-gray-200 text-center">Ngày công</th>
                                <th class="border-gray-200 text-start">Thực nhận</th>
                                <th class="border-gray-200 text-start">Thời gian tính lương</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($salaries))
                                <td colspan="9" class="text-lg-center w-100">Không tìm thấy bảng lương!</td>
                            @else
                                @foreach ($salaries as $key => $salary)
                                    <tr>
                                        <td class='text-center'>{{ $key + 1 }}</td>
                                        <td class='text-start'>{{ $salary->code_salary }}</td>
                                        <td class='text-start'>{{ $salary->employee->full_name }}</td>
                                        <td class='text-start'>{{ $salary->employee->position->name ?? ''}}</td>
                                        <td class='text-start'>
                                            {{ number_format($salary->monthly_salary, 0, '', ',') . ' VNĐ' }}</td>
                                        <td class='text-center'>{{ $salary->workday }}</td>
                                        <td class='text-start'>
                                            {{ number_format($salary->real_leaders, 0, '', ',') . ' VNĐ' }}</td>
                                        <td class='text-start'>{{ date_format($salary->created_at, 'd/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $salaries->appends(request()->only('key'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
