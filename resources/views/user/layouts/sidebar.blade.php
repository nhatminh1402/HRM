<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('material-template/assets/img/img_avatar.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span style="text-align: center" class="ms-1 font-weight-bold text-white">
                {{ Auth::guard('employee')->user()->full_name }}<br>
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.employee-info')) ? 'active bg-gradient-primary' : '' }} " href=" {{ route('user.employee-info') }} ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin nhân sự</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.salary')) ? 'active bg-gradient-primary' : '' }} " href="{{ route('user.salary') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">price_check</i>
                    </div>
                    <span class="nav-link-text ms-1">Lương cá nhân</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.timesheet-user')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.timesheet-user') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">timer</i>
                    </div>
                    <span class="nav-link-text ms-1">Bảng chấm công</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.timeline')) ? 'active bg-gradient-primary' : '' }} " href=" {{ route('user.timeline') }} ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Lịch sử làm việc</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.leave.show'))||(request()->routeIs('user.leave.add')) ? 'active bg-gradient-primary' : '' }} " href=" {{ route('user.leave.show') }} ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment_turned_in</i>
                    </div>
                    <span class="nav-link-text ms-1">Nghỉ phép</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.images')) ? 'active bg-gradient-primary' : '' }}  " href=" {{ route('user.images') }} ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">image</i>
                    </div>
                    <span class="nav-link-text ms-1">Ảnh nhận dạng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.reward')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.reward') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">star</i>
                    </div>
                    <span class="nav-link-text ms-1">Khen thưởng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.punishments')) ? 'active bg-gradient-primary' : '' }} " href="{{ route('user.punishments') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Kỷ luật</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">TÀI KHOẢN CÁ NHÂN
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ (request()->routeIs('user.view-change-password')) ? 'active bg-gradient-primary' : '' }} " href="{{ route('user.view-change-password') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">vpn_key</i>
                    </div>
                    <span class="nav-link-text ms-1">Đổi mật khẩu</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-white">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
