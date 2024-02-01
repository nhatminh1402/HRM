<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets/css/volt.css') }}" rel="stylesheet">
    {{-- jQuery --}}
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
</head>

<body>
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image"
                    data-background-lg="{{ asset('CoreUI/assets/img/avatars/signin.svg') }}">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">ĐĂNG NHẬP HỆ THỐNG</h1>
                            </div>
                            @if (session('numberLoginFailed') <= 3)
                                <form action="{{ route('admin.login.submit') }}" method="post" class="mt-4">
                                    @csrf
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                    </path>
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <input name="email" value="{{ old('email') }}" type="text"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                placeholder="Nhập email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="form-group">
                                        <!-- Form -->
                                        <div class="form-group mb-4">
                                            <label for="password">Mật khẩu</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <input name="password" value="{{ old('password') }}" type="password"
                                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    placeholder="Nhập mật khẩu">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-gray-800">ĐĂNG NHẬP</button>
                                    </div>
                                </form>
                            @endif

                            @if (session('numberLoginFailed') > 3)
                                <form method="post" action="{{ route('admin.login.validateCapchaCode') }}">
                                    @csrf
                                    <h1 class="text-center" style="font-size: 15px;">Bạn đã nhập sai thông tin quá 3
                                        lần. Vui lòng xác minh bạn không phải là
                                        robot!
                                    </h1>

                                    <div class="captcha">
                                        <div class="row">
                                            <div class="text-center">
                                                <span id="capcha-img">
                                                    {!! captcha_img('math') !!}
                                                </span>
                                                <button id="reload-capcha" style="margin-top: 15px; padding: 7px"
                                                    type="button" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-arrow-clockwise"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z">
                                                        </path>
                                                        <path
                                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466">
                                                        </path>
                                                    </svg>
                                                    Reload
                                                </button>
                                                <!-- ====== -->
                                                <div class="input-group input-group-outline my-3 focused is-focused">
                                                    <input name="captcha" type="text"
                                                        class="form-control {{ $errors->has('captcha') ? 'is-invalid' : '' }}"
                                                        placeholder="NHẬP MÃ XÁC MINH">
                                                    @error('captcha')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-gray-800">XÁC MINH</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script>
    //Request new captcha using ajax
    $("#reload-capcha").on("click", () => {
        $.ajax({
            type: "get",
            url: "{{ url('login/capcha-reload') }} ",
            success: function(response) {
                $("#capcha-img").html(response.captcha)
            }
        })
    })
</script>

</html>
