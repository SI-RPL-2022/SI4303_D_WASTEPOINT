<!-- Sidebar -->
<ul class="navbar-nav sidebar bg-white sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/nav-logo.svg') }}" width="85">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Data Sampah -->
    <li class="nav-item">
        <a class="nav-link" href="/kelola-sampah">
            <i class="bi bi-trash3-fill"></i>
            <span>Penukaran Sampah</span>
        </a>
    </li>

    <!-- Nav Item - Data Produk -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="bi bi-bag-check"></i>
            <span>Penukaran Produk</span>
        </a>
    </li>
    
    <!-- Nav Item - Konversi Poin -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="bi bi-currency-exchange"></i>
            <span>Konversi Poin</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0"> 

    <!-- Nav Item - Produk -->
    <li class="nav-item">
        <a class="nav-link" href="/produk-pemilah">
            <i class="bi bi-basket2-fill"></i>
            <span>Data Produk</span>
        </a>
    </li>
    
    <!-- Nav Item - Artikel -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="bi bi-book"></i>
            <span>Data Blog</span>
        </a>
    </li>
    
    <!-- Nav Item - Artikel -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="bi bi-person-lines-fill"></i>
            <span>Data User</span>
        </a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Logout -->
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn nav-link py-3 text-danger bg-white" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-left text-danger"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
