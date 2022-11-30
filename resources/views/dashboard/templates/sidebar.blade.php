<!-- Sidebar -->
{{-- bg-gradient-secondary --}}
<ul class="navbar-nav sidebar bg-gradient-success sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            {{-- rotate-n-15 --}}
            <i class="fas fa-poll"></i>
        </div>
        <div class="sidebar-brand-text mx-3">App SIK</div>
    </a>
    @if(!Auth()->user()->is_admin == 1)
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            {{-- <i class="fas fa-tasks"></i> --}}
            <i class="fas fa-th-large"></i>
            <span>Dashboard</span></a>
    </li>
    @endif

    @can('admin')
    <!-- Divider -->
    <hr class="sidebar-divider">
     <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            {{-- <i class="fas fa-tasks"></i> --}}
            <i class="fas fa-th-large"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/user">
            <i class="fas fa-users"></i>
            <span>User Akses</span></a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu pb-0-->
    <li class="nav-item {{ Request::is('dashboard/penduduk*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/penduduk">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Penduduk</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/kepala*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/kepala">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Keluarga</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/kelahiran*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/kelahiran">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Kelahiran</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/pendatang*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/pendatang">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pendatang</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('dashboard/pindah*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/pindah">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pindah</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/kematian*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/kematian">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Kematian</span></a>
    </li>
    {{-- <hr class="sidebar-divider mt-3">
    <li class="nav-item {{ Request::is('admin/laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Pembelian</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" type="submit" data-toggle="modal" data-target="#logoutModal">
            {{-- <i class="fas fa-fw fa-sign-out-alt"></i> --}}
            <i class="fas fa-power-off"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->