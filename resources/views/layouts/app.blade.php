<!DOCTYPE html>
<html>

<head>
    <title>Company Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom"
        style="background: linear-gradient(to right, #e1d4d4 10%, #ff0019 60%) !important;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('logoABC.png') }}" alt="Logo" width="80" height="40" class="me-2">
                <span class="fw-bold text-white ms-2 brand-text">
                    PT. ABC President Indonesia
                </span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('product') ? 'active' : '' }}" href="/product">
                            Our Product
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" href="/news">
                            News
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="/gallery">
                            Gallery
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a href="/login" class="btn btn-outline-light btn-sm rounded-pill">
                            🔐 Admin
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3"
        style="background: linear-gradient(to right, #ff0000 10%, #ff000075 60%);">
        © 2026 PT. ABC President Indonesia
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
