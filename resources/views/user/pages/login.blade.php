<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        ĐĂNG NHẬP HỆ THỐNG
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
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ĐĂNG NHẬP HỆ THỐNG
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('numberLoginFailed') <= 3)
                                    <form action="{{ route('login.submit') }}" method="post" class="text-start">
                                        @csrf
                                        {{-- email input area --}}
                                        <div class="input-group input-group-outline my-3 focused is-focused">
                                            <label class="form-label">Email</label>
                                            <input name="email" value="{{ old('email') }}" type="text"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- password input --}}
                                        <div class="input-group input-group-outline mb-3 focused is-focused">
                                            <label class="form-label">Password</label>
                                            <input name="password" value="{{ old('password') }}" type="password"
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember
                                                me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">ĐĂNG
                                                NHẬP</button>
                                        </div>
                                    </form>
                                @endif

                                @if (session('numberLoginFailed') > 3)
                                    <form method="post" action="{{ route('login.validateCapchaCode') }}">
                                        @csrf
                                        <h1 class="text-center" style="font-size: 15px;">Bạn đã nhập sai thông tin quá 3
                                            lần. Vui lòng xác minh bạn không phải là
                                            robot.</h1>

                                        <div class="captcha">
                                            <div class="row">
                                                <div class="text-center">
                                                    <span id="capcha-img">
                                                        {!! captcha_img('math') !!}
                                                    </span>
                                                    <button id="reload-capcha" style="margin-top: 15px; padding: 7px"
                                                        type="button" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z">
                                                            </path>
                                                            <path
                                                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466">
                                                            </path>
                                                        </svg>
                                                        Reload
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group input-group-outline my-3 focused is-focused">
                                                <label class="form-label">Nhập mã xác minh</label>
                                                <input name="captcha" type="text"
                                                    class="form-control {{ $errors->has('captcha') ? 'is-invalid' : '' }}">
                                                @error('captcha')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">XÁC
                                                MINH
                                            </button>
                                        </div>
                                    </form>
                                @endif
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
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        //Request new captcha using ajax
        $("#reload-capcha").on("click", () => {
            $.ajax({
                type: "get",
                url: "login/capcha-reload",
                success: function(response) {
                    $("#capcha-img").html(response.captcha)
                }
            })
        })
    </script>

    <script src="{{ asset('material-template/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
