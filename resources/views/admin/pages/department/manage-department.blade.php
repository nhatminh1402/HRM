@extends('admin.layouts.app')
@section('title', 'Department manage')
@section('page-title')
    PHÒNG BAN: {{ $department->name }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/add-employee-department.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if (!empty($department))
        <div class="row ml-4">
            <h2 class="mb-4 pb-2  text-primary">Nhân viên trong phòng ban : {{ $department->name }}</h2>
            <div class="container-lg">
                <div class="card mb-4">
                    <div class="card-header">Mô tả</div>
                    <div class="card-body">
                        {{-- <p></p> --}}
                        <span class="h6">{{ $department->description }}</span>
                    </div>
                </div>
            </div>
            <div class="card-header mb-4">
              
                    <div class="mb-3 mb-lg-0 row">
                        <div class="col-6 ">
                            <button type="button" class="btn btn-primary mb-4 ms-3" data-bs-toggle="modal"
                                data-bs-target="#add-employee">
                                <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                                        fill="white"></path>
                                </svg>Nhân viên
                            </button>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <form class="navbar-search w-50 " id="navbar-search-main"
                                action="{{ route('admin.department.search-employee', $department->id) }}" method="GET">
                                <div class="input-group input-group-merge search-bar">
                                    <span class="input-group-text" id="topbar-addon">
                                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="key" value="{{ request()->key }}" class="form-control"
                                        id="topbarInputIconLeft" placeholder="Tìm kiếm theo tên phòng ban"
                                        aria-label="Search" aria-describedby="topbar-addon">
                                </div>
                            </form>
                        </div>
                    </div>

              
            </div>
            <div class="card">
                <table class="table table-bordered table-centered ">
                    <thead class="border">
                        <tr class="table border">
                            <th class="rounded-start text-center">STT</th>
                            <th class="text-center">Mã nhân viên</th>
                            <th class="text-center">Tên nhân viên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Chức vụ</th>
                            <th class="text-center">Ngày thêm</th>
                            <th class="text-center rounded-end">Tình trạng</th>
                            <th class="text-center rounded-end">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if ($employees->isEmpty())

                            <td colspan="9" class="text-lg-center w-100">Không có nhân viên nào trong phòng ban !
                            </td>
                        @else
                            @foreach ($employees as $key => $employee)
                                <tr>
                                    <td class='text-center'>{{ $key + 1 }}</td>
                                    <td class='text-center'>{{ $employee->code_employee }}</td>
                                    <td class='text-center'>{{ $employee->full_name }}</td>
                                    <td class='text-center'>
                                        @if ($employee->gender == 1)
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </td>
                                    <td class='text-center'>{{ $employee->dob }}</td>
                                    <td class='text-center'>{{ $employee->position->name ?? '' }}</td>
                                    <td class='text-center'>{{ $employee->created_at->format('d-m-Y') }}</td>
                                    <td class='text-center'>{{ $employee->status ? 'Đang làm viêc' : 'Đã nghĩ việc' }}
                                    </td>
                                    <td class='text-center'>
                                        <a class="btn btn-delete"
                                            href="{{ route('admin.department.deleteEmployee', $employee->id) }}"
                                            class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                width="20" viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                                                            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                                                            6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                    fill="red" />
                                            </svg></a>
                                    </td>

                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>


        {{-- modal --}}
        <div class="modal fade" id="add-employee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thêm nhân viên vào phòng ban</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="mb-3 d-flex flex-column">
                            <input type="text" id="id-deparment" hidden value="{{ $department->id }}">
                            <label for="name" class="form-label mb-2 font-weight-bold"
                                value="{{ old('name') }}">Chọn
                                nhân
                                viên</label>
                            <select id="selected_employees" name="id_employee[]"
                                class="form-control js-example-basic-multiple-limit" multiple>
                                @foreach ($employeesHaveDeparmentNull as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" id="update_error_select"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="add-employee-btn">Thêm nhân viên</button>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
@section('script')
    <script src="{{ asset('assets/js/delete-employee-department.js') }}"></script>
@endsection
