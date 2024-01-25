@extends('user.layouts.base')

{{-- Thêm script file ở head --}}
@section('include-script')
    <link rel="stylesheet" href="{{ asset('material-template/assets/css/user/account_infor.css') }}">
@endsection

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin tài khoản')

@section('breadcrumb-item-after', 'Nghỉ phép')
@section('breadcrumb-item-before', 'Đơn nghỉ phép')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            @if (!empty($leave))
            <div class="card mb-4">
                <div class="card-header">TẠO ĐƠN NGHỈ PHÉP</div>
            </div>
            <h1>Đơn xin nghỉ phép</h1>
            <p>Kính gửi ban điều hành, bộ phận nhân sự Công ty Deha Việt Nam</p>
            <p>Tôi là {{ $leave->employee->full_name }} , là nhân viên tại Deha chi nhánh Huế với vai trò {{ $leave->employee->position->name }}.
                Tôi viết
                đơn này để xin nghỉ phép trong thời gian dưới đây:</p>

                    <ul style= 'list-style-position:inside'>
                        <li>Ngày bắt đầu nghỉ: {{ $leave->start_leave }} </li>
                        <li>Ngày kết thúc: {{ $leave->end_leave }}  </li>
                        <li>Tổng số ngày nghỉ: {{ $leave->number_days }}</li>
                    </ul>
            <p>Tôi xin được nghỉ phép vì: {!! $leave->description !!}</p> 
            <p>Tôi cam đoan sẽ hoàn thành tất cả các công việc
                trước khi nghỉ và chắc chắn rằng không gây ảnh hưởng đến sự hoạt động của công ty/đơn vị.</p>
            <p>Tôi đã thông báo về việc nghỉ này cho đồng nghiệp và tôi sẽ cung cấp mọi thông tin cần thiết để đảm bảo sự
                liên
                tục trong công việc.</p>
            <p>Tôi xin chân thành cảm ơn sự đồng thuận và sự chấp thuận của bạn. Mong nhận được sự phê duyệt từ phía quý
                công
                ty/đơn vị.</p>
            <p>Trân trọng,</p>
            <p>{{ $leave->employee->full_name }}</p>
            <p>{{ $leave->employee->position->name }}</p>
            <p>{{ $leave->employee->phone_number }}</p>
            <p>{{ $leave->employee->email }}</p>
            @endif
        </div>
    </div>
@endsection
