<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/nav-logo.svg') }}" width="105">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav gap-2 ms-lg-5 ms-lg-3 ms-0">
                <li class="nav-item mt-lg-0 mt-3">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Penukaran
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Sampah</a></li>
                        <li><a class="dropdown-item" href="#">Produk Pemilahan Sampah</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Konversi Poin</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Apa itu Waste Point?</a></li>
                        <li><a class="dropdown-item" href="#">Cerita Tentang Kami</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Blog</a>
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
                                    <img src="{{ asset('images/avatar-default.png') }}" alt="avatar" class="avatar rounded-circle border">
                                </span>
                                @else
                                    {{-- kalau udah ada avatar --}}
                                @endif
                            @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="bi bi-layout-text-sidebar-reverse me-2"></i>
                                        Dashboard
                                    </a>
                                </li>
                                @if (!Auth::user()->is_admin)
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <i class="bi bi-gear me-2"></i>
                                            Edit Profil
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li>
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="fa fa-sign-out me-2" aria-hidden="true"></i> 
                                            Logout
                                        </button>
                                    </li>
                                </form>
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