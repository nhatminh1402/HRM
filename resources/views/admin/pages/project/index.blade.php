@extends('admin.layouts.app')

@section('title', 'Project')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/manager-project.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('script')
    <script src="{{ asset('assets/js/delete-project.js') }}"></script>
    <script src="{{ asset('assets/js/create-project.js') }}"></script>
    <script src="{{ asset('assets/js/edit-project.js') }}"></script>
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
    <script>
        const CREATE_PROJECT_URL = '{{ route('admin.project.store') }}';
        const UPDATE_PROJECT_URL = '{{ route('admin.project.update') }}';
        const GET_PROJECT_URL = '{{ route('admin.project.edit') }}';
        const GET_ALL_EMPLOYEES = '{{route('admin.employee.list')}}';
    </script>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row ml-4 bg-white rounded shadow p-3 mb-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3 mb-4">Danh sách dự án </h3>
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create-project">
                    <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                            fill="white"></path>
                    </svg>Thêm mới
                </button>
            </div>
            <form class="navbar-search w-25 mb-4 mt-4" id="navbar-search-main" action="{{ route('admin.project.search') }}"
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
            <div class="table-responsive">
                <table class="table table-bordered mb-3 table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="rounded-start text-center">STT</th>
                            <th class="text-start">Mã dự án</th>
                            <th class="text-start">Tên dự án</th>
                            <th class="text-start">Mô tả</th>
                            <th class="text-start">Ngày tạo</th>
                            <th class="text-start">Ngày sửa</th>
                            <th class="text-center rounded-end" colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($projects->isEmpty())
                            <td colspan="9" class="text-lg-center w-100">Không tìm thấy dự án!</td>
                        @else
                            @foreach ($projects as $key => $project)
                                <tr>
                                    <td class='align-middle text-center'>{{ $key + 1 }}</td>
                                    <td class='align-middle text-start'>{{ $project->code_project }}</td>
                                    <td class='align-middle text-start text-name'>{{ $project->name }}</td>
                                    <td class='align-middle text-start text-area'>
                                        {{ e($project->description ?? 'Chưa có mô tả!') }}</td>
                                    <td class='align-middle text-start'>{{ $project->created_at }}</td>
                                    <td class='align-middle text-start'>{{ $project->updated_at }}</td>
                                    <td class='text-center'>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn border-0 btn-update" data-bs-toggle="modal"
                                                data-id="{{ $project->id }}" data-bs-target="#update-project">
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
                                            <form id="form-delete-project"
                                                action="{{ route('admin.project.destroy', $project->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete-project"><svg
                                                        xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                                        32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                                        6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="red" />
                                                    </svg></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $projects->appends(request()->only('key'))->links() }}
            </div>
        </div>
    </div>

    <!--Start Modal Create -->
    <div class="modal fade" id="create-project" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm mới dự án</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="{{ route('admin.project.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control d-none" name="code_project" id="code_project"
                            value="{{ $projectCode }}" readonly disabled>
                        <div class="mb-3">
                            <label for="name" class="form-label mb-2 font-weight-bold">Tên dự án<span
                                    class="text-danger">*</span>:</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name') }}">
                            <div class="text-danger" id="error_name"></div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="tags" class="form-label form-control-range font-weight-bold">Chọn nhân
                                viên<span class="text-danger">*</span>:</label>
                            <select id="selected_employees" name="selected_employees[]"
                                class="form-control select-employees" multiple>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" id="error_select"></div>
                            @error('selected_employees')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                            <textarea name="description" class="form-control" id="description" rows="3" cols="3">{{ strip_tags(old('description')) }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="add-project-btn">Thêm dự án</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Create -->

    <!--Start Modal Update -->
    <div class="modal fade" id="update-project" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm mới dự án</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (isset($project))
                        <form class="row" action="{{ route('admin.project.update', ['id' => $project->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">
                            <input type="text" class="form-control d-none" name="code_project_update" id="code_project_update">
                            <div class="mb-3">
                                <label for="name_update" class="form-label mb-2 font-weight-bold">Tên dự án<span
                                        class="text-danger">*</span>:</label>
                                <input type="text" name="name_update" class="form-control" id="name_update"
                                    value="{{ old('name_update') }}">
                                <div class="text-danger" id="error_name_update"></div>
                                @error('name_update')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="employee" class="form-label mb-2 font-weight-bold">Chọn nhân viên<span
                                        class="text-danger">*</span>:</label>
                                <select class="form-control mx-auto" name="select-employees[]" id="select-employees" multiple="multiple"></select>
                                <div class="text-danger" id="error_employee_update"></div>
                                @error('selected_employees')
                                    <div class="text-danger" id="error_select">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_update" class="form-label mb-2 font-weight-bold">Mô tả</label>
                                <textarea name="description_update" class="form-control" id="description_update" rows="3" cols="3">{{ strip_tags(old('description')) }}</textarea>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger">Không tìm thấy dự án!</div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="update-project-btn">Lưu lại</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Update -->
@endsection
