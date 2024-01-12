@extends('admin.layouts.app')

@section('title', 'Edit Position')

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Sửa chức vụ</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="{{ route('admin.employee.positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code_position" class="form-label mb-2 font-weight-bold">Mã chức vụ</label>
                    <input type="text" name="code_position" class="form-control"
                        value="{{ old('code_position', $position->code_position) }}">
                    @error('code_position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên chức vụ</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $position->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="salary_day" class="form-label mb-2 font-weight-bold">Lương ngày</label>
                    <input type="number" class="form-control" name="salary_day" id="salary_day"
                        value="{{ old('salary_day', $position->salary_day) }}">
                    @error('salary_day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description', $position->description)) }}</textarea>
                </div>
                <button class="btn btn-success">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection
