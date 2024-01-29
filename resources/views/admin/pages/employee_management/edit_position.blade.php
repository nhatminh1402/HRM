@extends('admin.layouts.app')

@section('title', 'Edit Position')

@section('content')
    <h2 class="fs-4">Sửa chức vụ</h2>
    <div class="row ml-4 w-100">
        <div class="col-12 mb-4">
            <form class="row" action="{{ route('admin.employee.positions.update', ['id' => $position->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="code_position" class="form-control d-none" value="{{ $position->code_position }}"
                    readonly disabled>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên chức vụ<span
                            class="text-danger">*</span>:</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $position->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="salary_day" class="form-label mb-2 font-weight-bold">Lương ngày<span
                            class="text-danger">*</span>:</label>
                    <input type="number" class="form-control" name="salary_day" id="salary_day"
                        value="{{ old('salary_day', $position->salary_day) }}">
                    @error('salary_day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3" cols="3">{{ old('description', $position->description) }}</textarea>
                </div>
                <input type="hidden" name="page" value="{{ $pageNumber }}">
                <div class="col-md-">
                    <button class="btn btn-success text-white">Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
@endsection
