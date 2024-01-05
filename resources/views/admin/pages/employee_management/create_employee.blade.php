@extends('admin.layouts.app')

@section('title', 'Create Employeee')

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thêm mới nhân viên</h2>
    <form action="">
        <div class="row">
            <div class="col-6 mb-3">
                <label for="code_employee" class="form-label mb-2 font-weight-bold">Mã nhân viên:</label>
                <input type="text" class="form-control" id="code_employee" name="code_employee" disabled value="">
            </div>
            <div class="col-6 mb-3">
                <label for="image" class="form-label mb-2 font-weight-bold">Ảnh 3x4 (Nếu có):</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="col-6 mb-3">
                <label for="name" class="form-label mb-2 font-weight-bold">Tên nhân viên<span
                        class="text-danger">*</span>:</label>
                <input type="email" class="form-control" id="name" placeholder="Nhập tên nhân viên">
            </div>
            <div class="col-6 mb-3">
                <label for="gender" class="form-label mb-2 font-weight-bold">Giới tính<span
                        class="text-danger">*</span>:</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn giới tính--</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="nickname" class="form-label mb-2 font-weight-bold">Biệt danh:</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nhập biệt danh">
            </div>
            <div class="col-6 mb-3">
                <label for="birthday" class="form-label mb-2 font-weight-bold">Ngày sinh<span
                        class="text-danger">*</span>:</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>
            <div class="col-6 mb-3">
                <label for="place_of_birth" class="form-label font-weight-bold">Nơi sinh:</label>
                <div class="form-floating">
                    <textarea class="form-control" name="place_of_birth" id="place_of_birth" cols="60" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <label for="domicile" class="form-label mb-2 font-weight-bold">Nguyên quán</label>
                <div class="form-floating">
                    <textarea class="form-control" name="domicile" id="domicile" cols="60" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <label for="household" class="form-label mb-2 font-weight-bold">Hộ khẩu<span
                        class="text-danger">*</span>:</label>
                <div class="form-floating">
                    <textarea class="form-control" name="household" id="household" cols="60" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <label for="station" class="form-label mb-2 font-weight-bold">Trạm trú:</label>
                <div class="form-floating">
                    <textarea class="form-control" name="station" id="station" cols="60" rows="2"></textarea>
                </div>
            </div>
            <div class="col-6 mb-3">
                <label for="cccd" class="form-label mb-2 font-weight-bold">Số CCCD<span
                        class="text-danger">*</span>:</label>
                <input type="text" class="form-control" id="cccd" name="cccd" placeholder="Nhập số CCCD">
            </div>
            <div class="col-6 mb-3">
                <label for="marital_status" class="form-label mb-2 font-weight-bold">Tình trạng hôn nhân:</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                    <option selected>Chọn tình trạng hôn nhân</option>
                    <option value="alone">Độc thân</option>
                    <option value="married">Đã kết hôn</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="date_range" class="form-label mb-2 font-weight-bold">Ngày cấp<span
                        class="text-danger">*</span>:</label>
                <input type="date" class="form-control" id="date_range" name="date_range">
            </div>
            <div class="col-6 mb-3">
                <label for="national" class="form-label mb-2 font-weight-bold">Quốc tịch<span
                        class="text-danger">*</span>:</label>
                <select name="national" id="national" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn quốc tịch--</option>
                    <option value="vietnamese">Việt Nam</option>
                    <option value="thaild">Thái Lan</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="issued_by" class="form-label mb-2 font-weight-bold">Nơi cấp<span
                        class="text-danger">*</span>:</label>
                <input type="text" class="form-control" id="issued_by" name="issued_by"
                    placeholder="Nhập nơi cấp">
            </div>
            <div class="col-6 mb-3">
                <label for="religion" class="form-label mb-2 font-weight-bold">Tôn giáo:</label>
                <input type="text" class="form-control" id="religion" name="religion" placeholder="Không">
            </div>
            <div class="col-6 mb-3">
                <label for="position" class="form-label mb-2 font-weight-bold">Chức vụ<span
                        class="text-danger">*</span>:</label>
                <select name="position" id="position" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn chức vụ--</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="national" class="form-label mb-2 font-weight-bold">Dân tộc<span
                        class="text-danger">*</span>:</label>
                <select name="national" id="national" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn dân tộc--</option>
                    <option value="kinh">Kinh</option>
                    <option value="mong">Mông</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="national" class="form-label mb-2 font-weight-bold">Bằng cấp<span
                        class="text-danger">*</span>:</label>
                <select name="national" id="national" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn bằng cấp--</option>
                    <option value="daihoc">Đại học</option>
                    <option value="giaosu">Giáo sư</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="national" class="form-label mb-2 font-weight-bold">Trạng thái<span
                        class="text-danger">*</span>:</label>
                <select name="national" id="national" class="form-select" aria-label="Default select example">
                    <option selected>--Chọn trạng thái--</option>
                    <option value="working">Đang làm việc</option>
                    <option value="thought_about_it">Đã nghỉ việc</option>
                </select>
            </div>
        </div>
        <button class="btn btn-success">Thêm nhân viên</button>
    </form>
@endsection
