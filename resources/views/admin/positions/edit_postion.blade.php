@extends('layouts.admin.app')

@section('title', 'Edit Position')

@section('css')

@endsection

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Sửa chức vụ</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code" class="form-label mb-2 font-weight-bold" value="{{ old('code') }}">Mã chức vụ</label>
                    <input type="text" name="code" class="form-control" id="code">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Tên chức vụ</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label mb-2 font-weight-bold" value="{{ old('salary') }}">Lương ngày</label>
                    <input type="number" class="form-control" name="salary" id="salary">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{old('description')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold" value="{{ old('date') }}">Ngày tạo</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection

@section('script')

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
