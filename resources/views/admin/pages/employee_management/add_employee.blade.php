@extends('admin.layouts.app')

@section('title', 'Create Employeee')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('material-template/assets/css/user/account_infor.css') }}">
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>


    <style>
        #upload-img-area {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thêm mới nhân viên</h2>
    <div id="form-employee">
        @csrf
        <div class="container-fluid">
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card">
                            <div class="card-header">ẢNH ĐẠI DIỆN</div>
                            {{-- Hidden input to select file  --}}
                            <input id="file-field" type="file" class="form-control" id="image" name="img-upload"
                                hidden>
                            <div id="upload-img-area" class="card-body text-center" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="CLICK ĐỂ UPLOAD ẢNH">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2"
                                    src="{{ asset('uploads/img-1705234069.jpg') }}" alt="">
                                <!-- Profile picture help block-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">THÔNG TIN CHI TIẾT NHÂN VIÊN</div>
                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="mb-3">
                                    <label class="small mb-1">MÃ NHÂN VIÊN</label>
                                    <input name="employee_code" class="form-control" type="text"
                                        value="{{ $employeeId }}" disabled>
                                    <div class="err-area"></div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">HỌ TÊN</label>
                                        <input name="full_name" class="form-control" type="text"
                                            placeholder="Nhập họ tên">
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">SỐ ĐIỆN THOẠI LIÊN HỆ</label>
                                        <input name="phone_number" class="form-control" type="text"
                                            placeholder="Nhập số điện thoại">
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">Email</label>
                                        <input name="email" placeholder="Nhập email" class="form-control" type="text">
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">SỐ CCCD</label>
                                        <input name="identify_number" class="form-control" type="text"
                                            placeholder="Nhập CCCD">
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">NGÀY SINH</label>
                                        <input name="dob" style="height: 44px" type="date" class="form-control">
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">GIỚI TÍNH</label>
                                        <select name="gender" class="form-select form-control"
                                            aria-label="Default select example">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">Mật khẩu</label>
                                        <input name="password" class="form-control" type="password"
                                            placeholder="Nhập mật khẩu">
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">Xác nhận mật khẩu</label>
                                        <input name="re-password" class="form-control" type="password"
                                            placeholder="Xác nhận mật khẩu">
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">BẰNG CẤP</label>
                                        <select name="degree" class="form-select form-control"
                                            aria-label="Default select example">
                                            <option value="{{ $listDegree['THPT'] }}">THPT</option>
                                            <option value="{{ $listDegree['CAO_DANG'] }}">CAO ĐẲNG</option>
                                            <option value="{{ $listDegree['DAI_HOC'] }}">ĐẠI HỌC</option>
                                            <option value="{{ $listDegree['CAO_HOC'] }}">CAO HỌC</option>
                                        </select>
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">CHUYÊN MÔN</label>
                                        <input name="major" type="text" class="form-control"
                                            placeholder="Nhập chuyên môn">
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">PHÒNG BAN</label>
                                        <select name="department_id" class="form-select form-control"
                                            aria-label="Default select example">
                                            @foreach ($listDepartments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">CHỨC VỤ</label>
                                        <select name="position_id" class="form-select form-control"
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
                                    <div class="row">
                                        <label class="small mb-1">ĐỊA CHỈ</label>
                                        <div class="col-md-4">
                                            <label style="font-size: 11px" class="small mb-1">TỈNH/THÀNH PHỐ</label>
                                            <select name="province_id" style="border: 1px solid red !important"
                                                id="province-select" class="form-select form-control select-extension">
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
                                                class="form-select form-control select-extension"
                                                aria-label="Default select example">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module" src="{{ asset('js/create_employee.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
@endsection
