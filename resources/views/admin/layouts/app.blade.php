<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">


    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: #f8fafc;
        }

        /* TOPBAR */
        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e9ecef;

            display: flex;
            align-items: center;
            justify-content: flex-end;

            padding: 0 30px;

            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;

            position: fixed;
            top: 0;
            left: 0;

            background: linear-gradient(180deg,
                    #1e293b,
                    #0f172a);

            box-shadow: 5px 0 20px rgba(0, 0, 0, .15);
        }

        /* LOGO AREA */
        .sidebar-title {
            text-align: center;
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            margin-bottom: 15px;
        }

        .sidebar-logo {
            width: 120px;
            margin-bottom: 10px;
        }

        .sidebar-title h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 0;
        }

        .sidebar-title small {
            color: #94a3b8;
        }

        /* MENU */
        .sidebar a {
            display: block;

            color: #cbd5e1;
            text-decoration: none;

            padding: 14px 22px;
            margin: 5px 12px;

            border-radius: 10px;

            transition: .3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .08);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: linear-gradient(90deg,
                    #dc3545,
                    #ff6b6b);

            color: white;
            font-weight: 600;

            box-shadow: 0 5px 15px rgba(220, 53, 69, .3);
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            padding: 30px;
        }

        /* CARD */
        .card {
            border: none;
            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .06);
        }

        /* TABLE */
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th {
            background: #dc3545;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border: 1px solid #e9ecef;
        }

        /* BUTTON */
        .btn {
            border-radius: 8px;
        }

        /* ALERT */
        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
        }

        /* SCROLLBAR */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <div class="navbar">

        <div class="ms-auto d-flex align-items-center">

            <span class="fw-semibold me-3">
                👋 {{ session('user_name') }}
            </span>

            <img src="{{ asset('logoABC.png') }}" width="40">

        </div>

    </div>

    <div class="sidebar">
        <div class="sidebar-title">

            <img src="{{ asset('logoABC.png') }}" alt="ABC Logo" class="sidebar-logo">
            <div class="text-center mb-3">


            </div>

            <h5 class="mb-0 text-white">
                PT. ABC President
            </h5>

            <small class="text-secondary">
                Admin Panel
            </small>

        </div>



        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="/admin/products" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
            📦 Produk
        </a>

        <a href="/admin/news" class="{{ request()->is('admin/news*') ? 'active' : '' }}">
            📰 Berita
        </a>

        <a href="/admin/galleries" class="{{ request()->is('admin/galleries*') ? 'active' : '' }}">
            🖼️ Galeri
        </a>

        <a href="/admin/company-profiles" class="{{ request()->is('admin/company-profiles*') ? 'active' : '' }}">
            🏢 Company Profile
        </a>

        <a href="/" target="_blank">
            🌐 Lihat Website
        </a>
        <li>

            <a href="{{ url('/admin/messages') }}">

                📩 Pesan Masuk

            </a>

        </li>

        <a href="/logout">
            🚪 Logout
        </a>

    </div>

    <div class="content">

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>

</html>
