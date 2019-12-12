<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Components:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
            </div>
        </div>
    </li>

{{--
    <!-- Nav Item - Pages Collapse Menu -->
    @foreach(config('menu') as $menu)


    @if(!Arr::has($menu, 'child'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route($menu['route']) }}">
                    <i class="{{ $menu['icon-class'] }}"></i>
                    <span>{{ ucfirst($menu['key']) }}</span>
                </a>
            </li>
        @else
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $menu['key'] }}" aria-expanded="true" aria-controls="{{ $menu['key'] }}">
            <i class="{{ $menu['icon-class'] }}"></i>
            <span>{{ ucfirst($menu['key']) }}</span>
        </a>
        <div id="{{ $menu['key'] }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach($menu['child'] as $childMenu)
                    <a class="collapse-item" href="{{ route($childMenu['route']) }}">{{ ucfirst($childMenu['key']) }}</a>
                @endforeach
            </div>
        </div>
    </li>
    @endif
    @endforeach--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>