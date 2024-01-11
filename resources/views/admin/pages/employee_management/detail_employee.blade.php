@extends('admin.layouts.app')

@section('title', 'User Information')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/user-infor.css') }}" rel="stylesheet">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin nhân viên</h2>
    @if (!empty($employee))
        {{-- <h5 class="mb-4 pb-2 border-bottom text-primary">Mã nhân viên:{{ $employee->code_employee }}</h5> --}}
        <div class="container">
            <div class="row">
                <div class="column">
                    <p>DB Ảnh nhân viên:</p>
                    <img class="image image-lg w-auto" alt="Image placeholder"
                        src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                    {{-- src="{{ $employee->image }}"> --}}
                </div>
                <div class="column">
                    <p>Tên nhân viên: {{ $employee->full_name }}</p>
                    <p>Giới tính: @if ($employee->gender == 1)
                            Nam
                        @else
                            Nữ
                        @endif
                    </p>
                    <p>Ngày sinh: {{ $employee->dob }}</p>
                    <p>DB Nơi sinh: Hà Nội</p>
                    <p>DB Số CCCD: 123456789</p>
                    <p>DB Ngày cấp: 01/01/2010</p>
                    <p>DB Nơi cấp: Hà Nội</p>
                    <p>DB Nguyên quán: Hà Nội</p>
                    <p>DB Quốc tịch: {{ $employee->nationality }}</p>
                    <p>DB Tộc: Kinh</p>
                    <p>DB Tôn giáo: Không</p>
                </div>
                <div class="column">
                    <p>DB Hộ khẩu: Hà Nội</p>
                    <p>DB Trạm trú: Hà Nội</p>
                    <p>Bằng cấp: {{ $employee->degree }} </p>
                    <p>Địa chỉ: {{ $employee->ward_name }}, {{ $employee->district_name }}, {{ $employee->province_name }}
                    </p>
                    <p>DB Chuyên môn: Kỹ sư Công nghệ thông tin</p>
                    <p>DB Phòng ban: IT</p>
                    <p>DB Chức vụ: Nhân viên</p>
                    <p>Trạng thái:
                        @if ($employee->status == 1)
                            <span class="text-white bg-success rounded fw-bold p-2 ml-3">Đang làm việc</span>
                        @else
                            <span class="text-white bg-danger rounded fw-bold p-2 ml-3">Đã nghỉ việc</span>
                        @endif
                </div>
            </div>
        </div>
    @endif

@endsection
