@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Tính lương nhân viên </h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code" class="form-label mb-2 font-weight-bold" value="{{ old('code') }}">Mã lương nhân
                        viên
                    </label>
                    <input type="text" name="code" class="form-control" id="code">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Chọn nhân
                        viên</label>
                    <select class="form-select mb-0">
                        <option selected>Chọn nhân viên</option>
                        <option value="1">PB2153232001-Trương Văn Phước</option>
                        <option value="2">PB2153232001-Trương Văn Phước</option>
                        <option value="3">PB2153232001-Trương Văn Phước</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Số ngày công
                    </label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold" value="{{ old('date') }}">Ngày tính
                        lương</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold" value="{{ old('date') }}">Ngày ngày
                        tạo</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success">
                    Tính lương nhân viên $</button>
            </form>
        </div>
    </div>
@endsection
