<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container align-items-center">
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
                    <a href="/register" class="btn btn-register mt-lg-0 mt-3 d-lg-inline d-block rounded">Register</a>
                    <a href="/login" class="btn btn-login mt-lg-0 mt-2 ms-lg-1 ms-0 d-lg-inline d-block rounded">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>