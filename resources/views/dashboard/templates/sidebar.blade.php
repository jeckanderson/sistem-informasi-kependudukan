<!-- Sidebar -->
{{-- bg-gradient-secondary --}}
<ul class="navbar-nav sidebar bg-gradient-primary sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-th-large"></i>
        </div>
        <div class="sidebar-brand-text mx-3">App SIK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
     <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-tasks"></i>
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
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/category">
            <i class="fas fa-th-large"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/product*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/product">
            <i class="fas fa-fw fa-folder"></i>
            <span>Produk</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/pembelian*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/pembelian">
            <i class="fas fa-shopping-cart"></i>
            <span>Pembelian</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('admin/pelanggan*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/pelanggan">
            <i class="fas fa-fw fa-user"></i>
            <span>Pelanggan</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::is('admin/laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Pembelian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" type="submit" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
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