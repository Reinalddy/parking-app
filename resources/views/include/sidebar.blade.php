<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="RADMIN"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-lavel">{{ __('Layouts')}} </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{url('inventory')}}"><i class="ik ik-shopping-cart"></i><span>{{ __('Inventory')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{url('pos')}}"><i class="ik ik-printer"></i><span>{{ __('POS')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'accounting') ? 'active' : '' }}">
                    <a href="{{url('accounting')}}"><i class="ik ik-printer"></i><span>{{ __('Accounting')}}</span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                        <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Users')}}</a>
                        <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                         @endcan
                         <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                        <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                        <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                        @endcan
                    </div>
                </div>
                {{-- parking management --}}
                @can('manage_parking')
                    <div class="nav-item {{ ($segment1 == 'parking') ? 'active' : '' }}">
                        <a href="{{url('admin/parking')}}"><i class="ik ik-book"></i><span>{{ __('Parking')}}</span> </a>
                    </div>
                @endcan                


                <!-- Include demo pages inside sidebar start-->
                @include('pages.sidebar-menu')
                <!-- Include demo pages inside sidebar end-->

            </nav>   
                
        </div>
    </div>
</div>