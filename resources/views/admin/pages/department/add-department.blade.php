@extends('admin.layouts.app')
@section('title', 'Add Department')
@section('page-title', 'TẠO PHÒNG BAN')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/create-department.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="mb-2 mb-lg-0">
                    <div class="d-flex justify-content-between w-100 flex-wrap">
                        <div class="mb-3 mb-lg-0">
                            <h4 class="mb-4">Danh sách phòng ban </h4>
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#create-deparment">
                                <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                                        fill="white"></path>
                                </svg>Thêm phòng ban
                            </button>
                        </div>
                        <form class="navbar-search w-25 mb-4 mt-5" id="navbar-search-main"
                            action="{{ route('admin.department.search-department') }}" method="GET">
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
                                    id="topbarInputIconLeft" placeholder="Tìm kiếm theo tên phòng ban" aria-label="Search"
                                    aria-describedby="topbar-addon">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-start text-center">Mã phòng ban</th>
                            <th class="text-start text-center">Tên phòng ban</th>
                            <th class="text-start text-center">Mô tả</th>
                            <th class="text-start text-center">Ngày tạo</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($departments->isEmpty())
                            <td colspan="9" class="text-lg-center w-100">Chưa thấy phòng ban nào!</td>
                        @else
                            @foreach ($departments as $key => $department)
                                <tr>
                                    <td class='align-middle text-center'>{{ $key + 1 }}</td>
                                    <td class='align-middle text-center'>{{ $department->code_department }}</td>
                                    <td class='align-middle text-center text-area'>{{ $department->name }}</td>
                                    <td class='align-middle text-center text-area'>{{ $department->description }}</td>
                                    <td class='align-middle text-center'>{{ $department->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class='text-center'>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn border-0 btn-edit" data-bs-toggle="modal"
                                                data-id="{{ $department->id }}" data-bs-target="#update-department">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                                                                        24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4
                                                                                        6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15
                                                                                        19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                                                                        22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1
                                                                                        373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0
                                                                                        88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40
                                                                                        40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"
                                                        fill="blue " />
                                                </svg>
                                            </button>


                                            <a class="btn border-0"
                                                href="{{ route('admin.department.detail', $department->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                    viewBox="0 0 576 512">
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4
                                                                        93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32
                                                                        288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288
                                                                        0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7
                                                                        7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                        fill="green" />
                                                </svg>
                                            </a>
                                            <form id="formDeleteDeparment"
                                                action="{{ route('admin.department.delete', $department->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                                                        32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                                                        6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="red" />
                                                    </svg>
                                                </button>
                                            </form>


                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="create-deparment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm phòng ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.department.post_add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label mb-2 font-weight-bold">Tên phòng ban</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                id="name">
                            <div class="text-danger" id="error_name"></div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="name" class="form-label mb-2 font-weight-bold"
                                value="{{ old('name') }}">Chọn nhân viên</label>
                            <select id="selected_employees" name="id_employee[]"
                                class="form-control js-example-basic-multiple-limit" multiple>
                                @foreach ($employeesHaveDeparmentNull as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                            <textarea name="description" class="form-control border-5" id="description" rows="3" cols="3">{{ old('description') }}</textarea>
                            <div class="text-danger" id="error_description"></div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="add-department-btn">Phòng ban</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="update-department" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sửa phòng ban</h5>
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <input type="text" hidden id="id_department">
                        <label for="name" class="form-label mb-2 font-weight-bold">Tên phòng
                            ban</label>
                        <input type="text" id="nameupdate" name="name" class="form-control"
                            value="{{ old('name') }}" id="name">
                        <div class="text-danger" id="update_error_name"></div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                        <textarea name="description" class="form-control border-5" id="descriptionupdate" rows="5" cols="20">{{ old('description') }}</textarea>
                        <div class="text-danger" id="update_error_description"></div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="update-department-btn">Lưu lại</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/delete-department.js') }}"></script>
@endsection
