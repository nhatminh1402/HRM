@extends('admin.layouts.app')

@section('title', 'Position')

@section('css')

@endsection

{{-- @section('script')
    <script src="{{ asset('assets/js/delete-position.js') }}"></script>
@endsection --}}

@section('content')
    <h2 class="mt-3 mb-4 pb-2 border-bottom text-primary">Quản lý kỷ luật</h2>
    <form action="" method="POST">
            <div class="row ml-4">
            <h4 class="mt-3 mb-4 pb-2 border-bottom text-primary">Kỷ luật nhân viên</h4>
            @csrf
            <div class="col-6 mb-3">
                <label for="code_discipline" class="form-label mb-2 font-weight-bold">Mã kỷ luật</label>
                <input type="text" class="form-control" name="code_discipline" id="code_discipline" value="" readonly
                    disabled>
                {{-- @error('code_discipline')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
            </div>
            <div class="col-6 mb-3">
                <label for="decision_number" class="form-label mb-2 font-weight-bold">Số quyêt định <span
                        class="text-danger">*</span>:</label>
                <input type="text" class="form-control" name="decision_number" id="decision_number" value=""
                    readonly disabled>
                {{-- @error('decision_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
            </div>
            <div class="col-6 mb-3">
                <label for="name" class="form-label mb-2 font-weight-bold">Tên kỷ luật <span
                        class="text-danger">*</span>:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                {{-- @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
            </div>
            <div class="col-6 mb-3">
                <label for="salary_day" class="form-label mb-2 font-weight-bold">Chọn nhân viên:</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn kỷ luật--</option>
                    <option value="alone">Đình chỉ công tác</option>
                    <option value="married">Trừ lương</option>
                </select>
                {{-- @error('salary_day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
            </div>
            <div class="col-6 mb-3">
                <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description')) }}</textarea>
            </div>
            <button class="btn btn-success">Thêm chức vụ</button>
    </div>
    </form>
@endsection
