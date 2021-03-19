
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Overlook</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <li class="d-none  d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <a href="#" style="color:white;">
            <span id="day"></span></a>
        <a href="#" style="color:white;"><span id="time"></span></a>
    </li>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="margin-bottom: -20px;" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i></a> /

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('admin/profile/show') }}">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
