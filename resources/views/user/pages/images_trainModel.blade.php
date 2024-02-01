@extends('user.layouts.base')

{{-- Định nghĩa breadcrumb --}}
@section('breadcrumb-item-after', 'Tài khoản cá nhân')
@section('breadcrumb-item-before', 'Thông tin nhân sự')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin nhân sự')

{{-- Đinh nghĩa nội dung cho trang hiển thị thông tin cá nhân ở đây --}}
@section('content')
@section('include-script')
    <script type="text/javascript" src="{{ asset('assets/js/add-images-trainModel.js') }}"></script>
@endsection


<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"> Ảnh xác thực khuôn mặt </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">Hãy thêm một sô ảnh khuôn mặt</h5>
                        </div>
                        <div class="panel-body">
                            <form id="dropzoneForm" class="dropzone dz-clickable" method="POST"
                                action="{{ route('user.dropzone.upload') }}">
                                <div class="dz-message" data-dz-message><span>Nhân vào đây để tải lên hình ảnh</span></div>
                                @csrf
                            </form>
                            <div class='mt-3'>
                                <button type="button" class="btn btn-success" id="submit-all">Upload</button>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ảnh đã tải lên</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" id="uploaded_image">
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
