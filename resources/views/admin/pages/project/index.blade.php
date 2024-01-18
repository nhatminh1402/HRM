@extends('admin.layouts.app')

@section('title', 'Project')

@section('css')
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/create-project.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection

@section('content')
    <h2 class="mt-3 mb-4 pb-2 border-bottom text-primary">Quản lý dự án</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="{{ route('admin.project.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="code_project" class="form-label mb-2 font-weight-bold">Mã dự án:</label>
                    <input type="text" class="form-control" name="code_project" id="code_project"
                        value="{{ $projectCode }}" readonly disabled>
                    @error('code_project')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên dự án<span
                            class="text-danger">*</span>:</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tags" class="form-label form-control-sm font-weight-bold">Chọn nhân viên<span
                            class="text-danger">*</span>:</label>
                    <select name="selected_employees[]" class="js-example-basic-multiple-limit form-control pb-4 d-flex"
                        multiple>
                        <div class="d-flex">
                            @foreach ($employees as $employee)
                                <div class="p-2">
                                    <option class="form-control" value="{{ $employee->id }}">{{ $employee->full_name }}
                                    </option>
                                </div>
                            @endforeach
                        </div>
                    </select>
                    @error('selected_employees')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description')) }}</textarea>
                </div>
                <button class="btn btn-success">Thêm dự án</button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách dự án </h3>
            </div>
            <form class="navbar-search w-25 mb-4" id="navbar-search-main" action="" method="GET">
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
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã dự án</th>
                            <th class="border-0  text-center">Tên dự án</th>
                            <th class="border-0  text-center">Mô tả</th>
                            <th class="border-0  text-center">Ngày tạo</th>
                            <th class="border-0  text-center rounded-end">Sửa</th>
                            <th class="border-0  text-center rounded-end">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple-limit').select2({
                maximumSelectionLength: 10
            });
        });
    </script>
@endsection
