@extends('admin.layouts.app')

@section('title', 'Create Employeee')

@section('css')
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
    <link href="{{ asset('assets/css/create_employee.css') }}" rel="stylesheet" />
@endsection

@section('page-title', 'THÊM MỚI NHÂN VIÊN')

@section('content')
    <div class="row">
        <div id="form-employee">
            @csrf
            <div class="container-fluid">
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">THÔNG TIN CHI TIẾT NHÂN VIÊN</div>
                                <div class="card-body">
                                    <input name="employee_code" class="form-control" type="text"
                                        value="{{ $employeeId }}" hidden>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Họ tên <span class="attention">*</span></label>
                                            <input name="full_name" class="form-control" type="text"
                                                placeholder="Nhập họ tên">
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Số điện thoại liên hệ <span
                                                    class="attention">*</span></label>
                                            <input name="phone_number" class="form-control" type="text"
                                                placeholder="Nhập số điện thoại">
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Email <span class="attention">*</span></label>
                                            <input name="email" placeholder="Nhập email" class="form-control"
                                                type="text">
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Số CCCD <span class="attention">*</span></label>
                                            <input name="identify_number" class="form-control" type="text"
                                                placeholder="Nhập CCCD">
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Ngày sinh <span class="attention">*</span></label>
                                            <input name="dob" type="date" class="form-select">
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Giới tính <span class="attention">*</span></label>
                                            <select name="gender" class="form-select">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            </select>
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Mật khẩu <span class="attention">*</span></label>
                                            <input name="password" class="form-control" type="password"
                                                placeholder="Nhập mật khẩu">
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Xác nhận mật khẩu <span
                                                    class="attention">*</span></label>
                                            <input name="re_password" class="form-control" type="password"
                                                placeholder="Xác nhận mật khẩu">
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Bằng cấp <span class="attention">*</span></label>
                                            <select name="degree" class="form-select">
                                                <option value="{{ $listDegree['THPT'] }}">THPT</option>
                                                <option value="{{ $listDegree['CAO_DANG'] }}">CAO ĐẲNG</option>
                                                <option value="{{ $listDegree['DAI_HOC'] }}">ĐẠI HỌC</option>
                                                <option value="{{ $listDegree['CAO_HOC'] }}">CAO HỌC</option>
                                            </select>
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Chuyên môn <span class="attention">*</span></label>
                                            <input name="major" type="text" class="form-control"
                                                placeholder="Nhập chuyên môn">
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1">Phòng ban <span class="attention">*</span></label>
                                            <select name="department_id" class="form-select"
                                                aria-label="Default select example">
                                                @foreach ($listDepartments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="err-area"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Chức vụ <span class="attention">*</span></label>
                                            <select name="position_id" class="form-select"
                                                aria-label="Default select example">
                                                @foreach ($listPositons as $position)
                                                    <option value="{{ $position->id }}"> {{ $position->name }} </option>
                                                @endforeach
                                            </select>
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="small mb-1">Lương cơ bản <span
                                                    class="attention">*</span></label>
                                            <input name="basic_salary" type="number" class="form-control"
                                                placeholder="Nhập lương cơ bản">
                                            <div class="err-area"></div>
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="row">
                                            <label class="small mb-1">Địa chỉ <span class="attention">*</span></label>
                                            <div class="col-md-4">
                                                <label style="font-size: 11px" class="small mb-1">TỈNH/THÀNH PHỐ</label>
                                                <select name="province_id" style="border: 1px solid red !important"
                                                    id="province-select"
                                                    class="form-select form-control select-extension">
                                                    <option value="un-check">CHỌN TỈNH/THÀNH PHỐ</option>
                                                    @foreach ($listProvince as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="err-area"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label style="font-size: 11px" class="small mb-1">QUẬN/HUYỆN</label>
                                                <select id="district-select" name="district_id"
                                                    class="form-select form-control select-extension">
                                                    <option value="un-check" disabled>CHỌN QUẬN/HUYỆN</option>
                                                </select>
                                                <div class="err-area"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label style="font-size: 11px" class="small mb-1">PHƯỜNG/XÃ</label>
                                                <select name="ward_id" id="ward-select"
                                                    class="form-select form-control select-extension">
                                                    <option value="un-check" disabled>CHỌN PHƯỜNG/XÃ</option>
                                                </select>
                                                <div class="err-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button id="btn-submit" type="button" class="btn btn-primary" type="button">THÊM
                                        MỚI
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card">
                                <div class="card-header">ẢNH ĐẠI DIỆN</div>
                                {{-- Hidden input to select file  --}}
                                <input id="file-field" type="file" class="form-control" id="image"
                                    name="img-upload" hidden>
                                <div id="upload-img-area" class="card-body text-center" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="CLICK ĐỂ UPLOAD ẢNH">
                                    <!-- Profile picture image-->
                                    <img style="width: 100%" class="img-account-profile mb-2"
                                        src="{{ asset('uploads/img-1705234069.jpg') }}" alt="">
                                    <!-- Profile picture help block-->
                                </div>
                                <div id="img-err" style="color: red; font-size: 14px" class="err-area text-center p-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="module" src="{{ asset('js/create_employee.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
@endsection
