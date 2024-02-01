@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin tài khoản</h2>
    <div class="container">
        <div class="row bg-white">
            <div class="col-sm-12">
                <form action="{{ route('admin.account.update-password') }}" method="POST">
                    @csrf
                    <h5 class="mb-4 pb-2 border-bottom text-primary">Đổi mật khẩu</h5>
                    <div class="mb-3">
                        <label class="form-label">NHẬP MẬT KHẨU HIỆN TẠI</label>
                        <input name="current_password" type="password"
                            class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NHẬP MẬT KHẨU MỚI</label>
                        <input name="new_password" type="password"
                            class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}">
                        @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">XÁC NHẬN MẬT KHẨU</label>
                        <input name="confirm_password" type="password"
                            class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}">
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">THAY ĐỔI</button>
                </form>
            </div>
        </div>
    @endsection
