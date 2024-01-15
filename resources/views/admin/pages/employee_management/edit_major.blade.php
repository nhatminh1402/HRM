@extends('admin.layouts.app')   

@section('title', 'Edit Major')

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Sửa chuyên môn</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code_major" value="{{ old('code_major') }}" class="form-label mb-2 font-weight-bold">Mã chuyên môn</label>
                    <input type="text" class="form-control" name="code_major" id="code_major">
                </div>
                <div class="mb-3">
                    <label for="name_major" value="{{ old('code_major') }}" class="form-label mb-2 font-weight-bold">Tên chuyên môn</label>
                    <input type="text" class="form-control" name="code_major" id="code_major">
                </div>
                <div class="mb-3">
                    <label for="code_degree" value="{{ old('code_degree') }}" class="form-label mb-2 font-weight-bold">Mã bằng cấp</label>
                    <input type="text" class="form-control" name="code_degree" id="code_degree">
                </div>
                <div class="mb-3">
                    <label for="name_degree" value="{{ old('name_degree') }}" class="form-label mb-2 font-weight-bold">Tên bằng cấp</label>
                    <input type="text" class="form-control" name="name_degree" id="name_degree">
                </div>  <div class="mb-3">
                    <label for="create_by" value="{{ old('create_by') }}" class="form-label mb-2 font-weight-bold">Người tạo</label>
                    <input type="text" class="form-control" name="create_by" id="create_by">
                </div>
                <div class="mb-3">
                    <label for="create_date" value="{{ old('create_date') }}" class="form-label mb-2 font-weight-bold">Ngày tạo</label>
                    <input type="date" class="form-control" name="create_date" id="create_date">
                </div>
                <button class="btn btn-success">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection
