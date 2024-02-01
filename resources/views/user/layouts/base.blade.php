    {{-- start head area --}}
    @include('user.layouts.head')
    {{-- end head area --}}

    {{-- start side-bar area --}}
    @include('user.layouts.sidebar')
    {{-- end side-bar area --}}

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        {{-- start nav-bar area --}}
        @include('user.layouts.navbar')
        {{-- end nav-bar area --}}
        <div class="container-fluid py-4">
            {{-- start content area --}}
            @yield('content')
            {{-- end content area --}}

            {{-- start footer  area --}}

            {{-- end footer area --}}
        </div>
        
    </main>

    @include('user.layouts.end')
