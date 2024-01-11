@extends('admin.layouts.app')

@section('title', 'Danh sách nhân viên')

@section('content')

    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách nhân viên </h3>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-2">
                <a href="">
                    <button type="button" class="btn btn-success text-white"> <span class="mr-5">Thêm mới nhân viên</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </button>
                </a>
            </div>
            <div class="col-2">
                <a href="">
                    <button type="button" class="btn btn-success text-white"><span>Xuất file Excel</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                            <path
                                d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <form class="navbar-search w-25 mb-2" id="navbar-search-main" action="{{ route('admin.employee.search-employee') }}"
            method="GET">
            <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" name="key" value=" {{ request('key') }} " class="form-control"
                    id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
            </div>
        </form>

        <div class="card border-0 shadow">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start text-center">STT</th>
                                <th class="border-0  text-center">Mã nhân viên</th>
                                <th class="border-0  text-center">Ảnh</th>
                                <th class="border-0  text-center">Tên nhân viên</th>
                                <th class="border-0  text-center">Giới tính</th>
                                <th class="border-0  text-center">Ngày sinh</th>
                                <th class="border-0  text-center rounded-end">Tình trạng</th>
                                <th class="border-0  text-center rounded-end">Xem</th>
                                <th class="border-0  text-center rounded-end">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($employees))
                                @foreach ($employees as $key => $employee)
                                    <tr>
                                        <td class='text-center'>{{ $key + 1 }}</td>
                                        <td class='text-center'>{{ $employee->code_employee }}</td>
                                        <td class='text-center'>
                                            <img class="image image-md" alt="Image placeholder"
                                                src="{{ $employee->image }}">
                                        </td>
                                        <td class='text-center'>{{ $employee->full_name }}</td>
                                        <td class='text-center'>
                                            @if ($employee->gender == 1)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </td>
                                        <td class='text-center'>{{ $employee->dob }}</td>
                                        <td class='text-center'>
                                            @if ($employee->status == 1)
                                                Đang làm việc
                                            @else
                                                Đã nghỉ việc
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.employee.detail-employee', $employee->id) }}"
                                                class="bg-success d-inline-block p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="bg-danger d-inline-block p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $employees->withQueryString()->links() }}
                </div>

            </div>
        </div>

    </div>

@endsection
