@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('css')
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/create-project.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection

@section('content')
    <h2 class="mt-4 mb-4 pb-2 border-bottom text-primary">Sửa dự án</h2>
    <div class="row ml-4 w-100">
        <div class="col-12 mb-4">
            <form action="{{route('admin.project.update', ['id' => $project->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code_project" class="form-label mb-2 font-weight-bold">Mã dự án</label>
                    <input type="text" class="form-control" name="code_project" id="code_project"
                        value="{{ $project->code_project }}" readonly disabled>
                    @error('code_project')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên dự án</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $project->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="employee" class="form-label mb-2 font-weight-bold">Chọn nhân viên</label>
                    <select name="selected_employees[]" class="js-example-basic-multiple-limit form-control pb-4 d-flex" multiple>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" @if(in_array($employee->id, $selectedEmployees)) selected @endif>
                                {{ $employee->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('selected_employees')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description', $project->description)) }}</textarea>
                </div>
                <input type="hidden" name="page" value="{{ $pageNumber }}">
                <button class="btn btn-success">Lưu lại</button>
            </form>
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
