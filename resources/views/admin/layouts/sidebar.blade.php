<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('CoreUI/assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('CoreUI/assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    {{-- Tổng quan --}}
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-group">
            <a class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-apps') }}"></use>
                </svg> Tổng quan
            </a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><span
                            class="nav-icon"></span>
                        Thống kê</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.employee') }}"><span
                            class="nav-icon"></span>
                        Danh sách nhân viên</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.account') }}"><span
                            class="nav-icon"></span>
                        Danh sách tài khoản</a></li>
            </ul>
        </li>
        {{-- Quản lý nhân viên --}}
        <li class="nav-group">
            <a class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                </svg> Quản lý nhân viên
            </a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.home') }}"><span
                            class="nav-icon"></span>
                        Chức vụ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.major') }}"><span
                            class="nav-icon"></span>
                        Chuyên môn</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.create-employee') }}"><span
                            class="nav-icon"></span>
                        Thêm mới nhân viên</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.list-employee') }}"><span
                            class="nav-icon"></span>
                        Danh sách nhân viên</a></li>
            </ul>
        </li>
        {{-- Quản lý phòng ban --}}
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.department.add') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                </svg> Quản lý phòng ban</a>
        </li>
        {{-- Quản lý dự án --}}
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.project.home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                </svg> Quản lý dự án</a>
        </li>
        {{-- Khen thưởng - kỷ luật --}}
        <li class="nav-group">
            <a class="nav-link nav-group-toggle">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-dollar') }}"></use>
                </svg> Khen thưởng - kỷ luật</a>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href=" {{ route('admin.reward.index') }}"><span
                            class="nav-icon"></span>
                        Quản lý khen thưởng</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.discipline.home') }}"><span
                            class="nav-icon"></span>
                        Quản lý kỷ luật</a></li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-money') }}"></use>
                </svg> Quản lý lương
            </a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.salary.show')}}"><span class="nav-icon"></span>
                        Bảng tính lương</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.salary.calculator')}}"><span class="nav-icon"></span>
                        Tính lương</a></li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('CoreUI/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg> Tài khoản
            </a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span
                            class="nav-icon"></span>
                        Thông tin cá nhân</a></li>
                <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span
                            class="nav-icon"></span>
                        Danh sách tài khoản</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.account.change-password') }}"><span
                            class="nav-icon"></span>
                        Đổi mật khẩu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}"><span
                            class="nav-icon"></span>
                        Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
