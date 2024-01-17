@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h2 class="mt-4 mb-4 pb-2 border-bottom text-primary">Sửa dự án</h2>
    <div class="row ml-4 w-100">
        <div class="col-12 mb-4">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="code_project" class="form-label mb-2 font-weight-bold">Mã dự án</label>
                    <input type="text" class="form-control" name="code_project" id="code_project"
                        value="" readonly disabled>
                    @error('code_project')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên dự án</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="employee" class="form-label mb-2 font-weight-bold">Chọn nhân viên</label>
                    <select name="employee" id="employee" class="form-select" aria-label="Default select example">
                        <option selected>--Chọn nhân viên--</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description')) }}</textarea>
                </div>
                <button class="btn btn-success">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection
