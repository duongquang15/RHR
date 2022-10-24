<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/logo1.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('changepass') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Đổi mật khẩu</span>
                    </a>
                </li>

                {{-- @if (Auth::user()->role_name=='Admin') --}}
                    
                    
                    <li class="sidebar-item">
                        <a href="{{ route('user.index')}}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Quản lý User</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="{{ route('level.index') }}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Quản lý Level</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('job.index') }}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Quản lý Job</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('candidate.index') }}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Quản lý Ứng viên</span>
                        </a>
                    </li>
                {{-- @endif --}}
                
                
                
                
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form1').submit();">
                        <i class="bi bi-box-arrow-right" style="margin-left: 1rem"></i>
                        <p style="display:inline-block">Logout</p>
                    </a>
                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>