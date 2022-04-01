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
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name}}
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-layout-text-sidebar-reverse me-2"></i>Dashboard</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Edit Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action ="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                            
                        </li>
                            
                        
                        
                        
                    </ul>
                </li>
                
                @else
                
                <li class="nav-item">
                    <a href="{{ url('/register') }}" class="btn btn-register mt-lg-0 mt-3 d-lg-inline d-block rounded">Register</a>
                    <a href="{{ url('/login') }}" class="btn btn-login mt-lg-0 mt-2 ms-lg-1 ms-0 d-lg-inline d-block rounded">Login</a>
                </li>
                </ul>
                @endauth
              
        </div>
    </div>
</nav>