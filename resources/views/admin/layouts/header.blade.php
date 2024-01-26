<header class="header header-sticky">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('CoreUI/assets/brand/coreui.svg#full') }}"></use>
            </svg></a>
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">TRANG CHỦ</a></li>
        </ul>
        <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
            </li>
            <li class="nav-item"><a class="nav-link" href="#">
            </li>
            <li class="nav-item"><a class="nav-link" href="#">
            </li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img"
                            src="{{ asset('CoreUI/assets/img/avatars/8.jpg') }}" alt="user@gmail.com">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>
