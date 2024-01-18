@extends('user.layouts.base')

{{-- Định nghĩa breadcrumb --}}
@section('breadcrumb-item-after', 'Tài khoản cá nhân')
@section('breadcrumb-item-before', 'Thông tin nhân sự')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Thông tin nhân sự')

{{-- Đinh nghĩa nội dung cho trang hiển thị thông tin cá nhân ở đây --}}
@section('content')
    @if (!empty($user))
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Thông tin nhân sự</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="img-avatar" style="padding: 20px; text-align:center">
                                    <img style="width: 95%" src="/uploads/{{ $user->image }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">MÃ NHÂN VIÊN: {{ $user->code_employee }}
                                                </h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                            class="text-dark">Tên nhân
                                                            viên:</strong>&nbsp;{{ $user->full_name }}</li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Giới
                                                            tính:</strong>&nbsp;{{ $user->gender ? 'Nam' : 'Nữ' }}</li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Ngày sinh:</strong>&nbsp;{{ $user->dob }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Số CMND:</strong>
                                                        &nbsp;{{ $user->identify_number }}</li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Địa chỉ:</strong>
                                                        &nbsp;{{ $user->ward->name . ', ' . $user->district->name . ', ' . $user->province->name }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Số điện thoại:</strong> &nbsp;
                                                        {{ $user->phone_number }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">

                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Email:</strong> &nbsp;
                                                        {{ $user->email }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Trình độ:</strong>&nbsp; {{ $user->degree }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Chuyên nghành:</strong>&nbsp;
                                                        {{ $user->major }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Loại nhân viên:</strong>&nbsp;
                                                        {{ $user->position->name }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Thuộc phòng ban:</strong>&nbsp;
                                                        {{ $user->department->name ?? '' }}
                                                    </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                            class="text-dark">Trạng thái: </strong>&nbsp;
                                                        @if ($user->status == 1)
                                                            <span class="badge badge-sm bg-gradient-success">Đang làm
                                                                việc</span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-danger">Đã nghĩ việc
                                                                việc</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card border-0 shadow">
                    <div class="card-header border-bottom d-flex align-items-center justify-content-between"
                        style="margin-bottom: 20px">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0" style="height: 58px; padding-top: 19px"> Images user
                            </h2>
                        </div>
                        <div id="images-upload-notice" style="display: none" class="alert alert-danger alert-dismissible"
                            role="alert"></div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-10 mb-3" id="img-list">
                            @if (count($images) > 0)
                                <div id="image-preview" style="margin-top: 10px">
                                    <div class="row">
                                        @foreach ($images as $img)
                                            <div class="col-md-2 mb-3">
                                                <div class="image-container position-relative">
                                                    <img src="{{ asset('usersimages/' . $idUser . '/' . $img) }}"
                                                        class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                                    <a href="{{ route('user.deleteImage', ['imageName' => $img]) }}">
                                                        <span
                                                            class="close position-absolute top-0 end-0 text-danger">&times;</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.uploadImage') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="images">User images selection</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control-plaintext @error('image.*') is-invalid @enderror"
                                            name="image[]" id="images" accept="" multiple required />
                                    </div>
                                    @error('image.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn-danger    btn btn-gray-800 mt-2 animate-up-2">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
