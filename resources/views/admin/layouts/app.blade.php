<!DOCTYPE html>
<html lang="en">

<!-- start head are -->
@include('admin.layouts.head')
<!-- end head are -->

<body>
    <!-- start main side bar -->
    @include('admin.layouts.sidebar')
    <!-- end main side bar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- start header -->
        @include('admin.layouts.header')
        <!-- end header -->
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>

    @yield('script')

</body>

</html>
