
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

                <a href="/admin/hotel/list" class="nav-link {{ request()->is('admin/hotel*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hotel"></i></div>
                     @lang('hotel.hotels')</a>
                <a href="/admin/customer/list" class="nav-link {{ request()->is('admin/customer*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Customers</a>

                <a href="/admin/identification_type/list" class="nav-link {{ request()->is('admin/identification_type*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                    Identification Type</a>


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


                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-money"></i></div>
                    Payments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="payment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is("admin/payments*") ? 'active' : '' }}" href="{{ url('admin/payments/list') }}">Payment</a>
                        <a class="nav-link {{ request()->is("admin/payments_type*") ? 'active' : '' }}" href="{{ url('admin/payments_type/list') }}">Payment Type</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rooms" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    Rooms
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="rooms" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is("admin/rooms*") ? 'active' : '' }}" href="{{ url('admin/rooms/list') }}">Room</a>
                        <a class="nav-link {{ request()->is("admin/room_type*") ? 'active' : '' }}" href="{{ url('admin/room_type/list') }}">Room Type</a>
                    </nav>
                </div>

                <a href="/admin/contact_us/list" class="nav-link {{ request()->is('admin/contact_us*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                    Contact Us</a>

                <a href="/admin/slider/list" class="nav-link {{ request()->is('admin/slider*') ? 'active' : '' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-ambulance"></i></div>
                    Sliders</a>

    </nav>
</div>
