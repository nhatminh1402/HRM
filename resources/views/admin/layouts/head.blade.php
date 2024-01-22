<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('CoreUI/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('CoreUI/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('CoreUI/css/style.css') }}" rel="stylesheet">
    {{-- Jquery --}}
    <script src="{{ asset('lib/jquery-3.7.1.min') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">

    <script src="{{ asset('assets/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>

    @yield('css')
</head>
