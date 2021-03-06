<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
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
            <span>{{  __('admin-lang::menu.sidebar.dashboard') }}</span></a>
    </li>

    <!-- Divider -->

    <hr class="sidebar-divider">
    <!-- Меню  -->
    @foreach(config('admin.menu') as $key => $menu)

        @if($key == 'users' &&  !\Auth::user()->hasRole('admin'))
            @continue
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                <i class="{{ $menu['iconClass'] }}"></i>
                <span>{{ __('admin-lang::menu.sidebar.' . $key) }}</span>
            </a>
            <div id="collapse-{{ $key }}" class="collapse" aria-labelledby="heading-{{ $key }}" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"> {{ __('admin-lang::menu.sidebar.' . $key . '_component') }}</h6>
                    @foreach($menu['subMenu'] as $subKey => $subMenu)
                        <a class="collapse-item" href="{{ route($subMenu['routeName']) }}">{{ __('admin-lang::menu.sidebar.' . $subKey) }}</a>
                    @endforeach
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
@endforeach
<!-- Divider -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>