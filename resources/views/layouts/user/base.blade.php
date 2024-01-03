    {{-- start head area --}}
    @include('layouts.user.head')
    {{-- end head area --}}

    {{-- start side-bar area --}}
    @include('layouts.user.sidebar')
    {{-- end side-bar area --}}

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        {{-- start nav-bar area --}}
        @include('layouts.user.navbar')
        {{-- end nav-bar area --}}
        <div class="container-fluid py-4">
            {{-- start content area --}}
            @yield('content')
            {{-- end content area --}}

            {{-- start footer  area --}}
            @include('layouts.user.footer')
            {{-- end footer area --}}
        </div>
    </main>

    @include('layouts.user.end')
