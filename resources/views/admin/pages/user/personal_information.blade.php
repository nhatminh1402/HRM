@extends('admin.layouts.app')

@section('title', 'User Information')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/user-infor.css') }}" rel="stylesheet">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin nhân viên</h2>
    <h5 class="mb-4 pb-2 border-bottom text-primary">Mã nhân viên: </h5>
    <div class="container">
        <div class="row">
            <div class="column">
                <p>Ảnh nhân viên:</p>
                <img class="image image-lg w-auto" alt="Image placeholder"
                    src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
            </div>
            <div class="column">
                <p>Tên nhân viên: John Doe</p>
                <p>Biệt danh: JD</p>
                <p>Giới tính: Nam</p>
                <p>Ngày sinh: 15/03/1990</p>
                <p>Nơi sinh: Hà Nội</p>
                <p>Tình trạng hôn nhân: Độc thân</p>
                <p>Số CCCD: 123456789</p>
                <p>Ngày cấp: 01/01/2010</p>
                <p>Nơi cấp: Hà Nội</p>
                <p>Nguyên quán: Hà Nội</p>
                <p>Quốc tịch: Việt Nam</p>
                <p>Dân tộc: Kinh</p>
                <p>Tôn giáo: Không</p>
            </div>
            <div class="column" style="background-color:#bbb;">
                <p>Hộ khẩu: Hà Nội</p>
                <p>Trạm trú: Hà Nội</p>
                <p>Bằng cấp: Đại học</p>
                <p>Chuyên môn: Kỹ sư Công nghệ thông tin</p>
                <p>Phòng ban: IT</p>
                <p>Chức vụ: Nhân viên</p>
                <p>Trạng thái: <span class="text-white bg-success rounded fw-bold p-2 ml-3">Đang làm việc</span>
            </div>
        </div>
    </div>
@endsection
