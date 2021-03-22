
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin/dashboard*' ? 'active' : '') }}" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a href="/admin/user/list" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                     @lang('user.users')</a>
                <a href="/admin/customer/list" class="nav-link {{ request()->is('admin/customer*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Customer</a>
                <a href="/admin/category/list" class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Category</a>
                <a href="/admin/course/list" class="nav-link {{ request()->is('admin/course*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                    Course</a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                    Bookings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is("admin/bookings*") ? 'active' : '' }}" href="{{ url('admin/bookings/list') }}">Booking</a>
                        <a class="nav-link {{ request()->is("admin/bookings_type*") ? 'active' : '' }}" href="{{ url('admin/bookings_type/list') }}">Booking Type</a>
                    </nav>
                </div>

            </div>
        </div>
    </nav>
</div>
