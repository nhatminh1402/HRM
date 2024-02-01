<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Cập nhật mật khẩu
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('material-template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href=" {{ asset('material-template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href=" {{ asset('material-template/assets/css/material-dashboard.css?v=3.1.0') }} "
        rel="stylesheet" />
    <script src="{{ asset('lib\jquery-3.7.1.min') }}"></script>
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">CẬP NHẬT MẬT KHẨU
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('forgotPassword.update', ['employee_id' => $employee_id, 'token' => $token]) }}"
                                    method="post" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-4 focused is-focused">
                                        <label class="form-label">Mật khẩu</label>
                                        <input name="password" type="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- password input --}}
                                    <div class="input-group input-group-outline mb-1 focused is-focused">
                                        <label class="form-label">Xác nhận mật khẩu</label>
                                        <input name="confirm_password" type="password"
                                            class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}">
                                        @error('confirm_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">CẬP
                                            NHẬT</button>
                                    </div>
                                </form>
                                <p class="mt-1 text-sm text-center">
                                    <a href="{{ route('forgotPassword.view') }}"
                                        class="text-primary text-gradient font-weight-bold">Trở về đăng nhập</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-template/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material-template/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material-template/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-template/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-template/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
