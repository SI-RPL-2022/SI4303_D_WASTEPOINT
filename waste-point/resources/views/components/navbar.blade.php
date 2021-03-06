<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/nav-logo.svg') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav gap-2 ms-lg-5 ms-lg-3 ms-0">
                <li class="nav-item line mt-lg-0 mt-3">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item line dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Penukaran
                    </a>
                    <ul class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item py-2" href="{{ Route('penukaran-sampah') }}">
                                <i class="bi bi-trash3 me-2"></i> Sampah
                                <p class="ps-4 mb-0 opacity-50"><small>Tukarkan sampah dapatkan poin.</small></p>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ Route('penukaran-produk') }}">
                                <i class="bi bi-cart4 me-2"></i> Produk Pemilahan Sampah
                                <p class="ps-4 mb-0 opacity-50"><small>Tukarkan poin produk pemilahan sampah.</small></p>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ Route('konversi-poin') }}">
                                <i class="bi bi-cash-coin me-2"></i> Konversi Poin
                                <p class="ps-4 mb-0 opacity-50"><small>Konversi poin jadi uang melalui rekening.</small></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item line dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item py-2" href="#">Apa itu Waste Point?</a></li>
                        <li><a class="dropdown-item py-2" href="#">Cerita Tentang Kami</a></li>
                    </ul>
                </li>
                <li class="nav-item line">
                    <a class="nav-link active py-2" href="{{ Route('blog') }}">Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link active btn-hover rounded dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-lg-2 me-0">{{ Auth::user()->name }}</span>
                            @if (!Auth::user()->is_admin)
                                @if (Auth::user()->avatar == null)
                                <span class="rounded-circle bg-white">
                                    <img src="{{ asset('images/avatar-default.png') }}" alt="avatar" class="avatar rounded-circle">
                                </span>
                                @else
                                    <span class="rounded-circle bg-white">
                                        <img src="{{ asset('avatars/'.Auth::user()->avatar) }}" alt="avatar" class="avatar rounded-circle">
                                    </span>
                                @endif
                            @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdown">
                                @if (!Auth::user()->is_admin)
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ Route('user.dashboard-user') }}">
                                            <i class="bi bi-layout-text-sidebar-reverse me-2"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ Route('user.edit-profil') }}">
                                            <i class="bi bi-gear me-2"></i>
                                            Edit Profil
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ Route('admin.dashboard') }}">
                                            <i class="bi bi-layout-text-sidebar-reverse me-2"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="#" class="dropdown-item text-danger py-2" type="submit" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fa fa-sign-out me-2" aria-hidden="true"></i> 
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-register mt-lg-0 mt-3 d-lg-inline d-block rounded">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-login mt-lg-0 mt-2 ms-lg-1 ms-0 d-lg-inline d-block rounded">Login</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Anda yakin ingin logout dari Waste Point?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/ShadowOnScroll.js') }}"></script>