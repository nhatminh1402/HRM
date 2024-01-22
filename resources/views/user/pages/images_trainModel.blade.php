@extends('user.layouts.base')

{{-- Định nghĩa breadcrumb --}}
@section('breadcrumb-item-after', 'Tài khoản cá nhân')
@section('breadcrumb-item-before', 'Thông tin nhân sự')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin nhân sự')

{{-- Đinh nghĩa nội dung cho trang hiển thị thông tin cá nhân ở đây --}}
@section('content')
@section('include-script')
    <script type="text/javascript" src="{{ asset('assets/js/add-images-trainModel.js') }}" > </script>
@endsection
<div class="container-fluid">
    <br />
    <h3>Image Upload For Train Model</h3>
    <br />

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Select Image</h3>
        </div>
        <div class="panel-body">
            <form id="dropzoneForm" class="dropzone dz-clickable" method="POST"  action="{{ route('user.dropzone.upload') }}">
                @csrf
            </form>
            <div>
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>
        </div>
    </div>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Uploaded Image</h3>
        </div>
        <div class="panel-body">
            <div class="row" id="uploaded_image">
            
            </div>
        </div>
    </div>
</div>
@endsection
