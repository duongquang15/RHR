<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            {{-- @if (Auth::user()->role_name=='Admin')
                            <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Super Admin')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Super Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">User Normal</span>
                            @endif --}}
                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('changepass') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Chnage Password</span>
                    </a>
                </li>
                
                {{-- @if (Auth::user()->role_name=='Admin') --}}
                   
                    
                    <li class="sidebar-item">
                        <a href="{{ route('user.index')}}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Quản lý User</span>
                        </a>
                    </li>
                    
                {{-- @endif --}}
                
                
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
               
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>