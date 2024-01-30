<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="{{ asset('CoreUI/css/style.css') }}" rel="stylesheet">
    {{-- Jquery --}}
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">

    <script src="{{ asset('assets/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- chart-js --}}
    <script src="{{ asset('lib/Chart.min.js') }}"></script>
    {{-- avatar css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/avatar.css') }}">

    @yield('css')
</head>

<body>
    <!-- start main side bar -->
    @include('admin.layouts.sidebar')
    <!-- end main side bar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-white">
        <!-- start header -->
        @include('admin.layouts.header')
        <!-- end header -->
        <div class="body flex-grow-1 px-3 bg-white">
            <div class="container-fluid mb-5">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div>© HỆ THỐNG QUẢN LÝ NHÂN SỰ</div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('CoreUI/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('CoreUI/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('CoreUI/js/main.js') }}"></script>

    @yield('script')
</body>

</html>
