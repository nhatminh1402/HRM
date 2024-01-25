@extends('user.layouts.base')

{{-- Thêm script file ở head --}}
@section('include-script')
    <link rel="stylesheet" href="{{ asset('material-template/assets/css/user/account_infor.css') }}">
@endsection

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin tài khoản')

@section('breadcrumb-item-after', 'Nghỉ phép')
@section('breadcrumb-item-before', 'Thêm nghỉ phép')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">TẠO ĐƠN NGHỈ PHÉP</div>
                <div class="card-body">
                    <form id="submit-leave" action="{{ route('user.leave.post_add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Lý do xin nghỉ phép</label>
                            <textarea name="description" class="form-control" id="description" rows="50" cols="50"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1 font-weight-bold">Ngày bắt đầu nghỉ phép</label>
                                <input id="startDate" name="start_leave" class="form-control" type="date">
                                @error('start_leave')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1 font-weight-bold">Ngày kết thúc nghỉ phép</label>
                                <input id="endDate" name="end_leave" class="form-control" type="date">
                                @error('end_leave')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-3">
                                <label class="small mb-1">Số ngày nghỉ</label>
                                <input class="form-control FontLarger" name="number_days" type="text" value="">
                                @error('number_days')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" id="btn-submit" type="button">Tạo đơn nghỉ phép</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('assets/js/leave.js') }}"></script>
@endsection
@endsection
