@extends('admin.layouts.app')

@section('content')
    {{-- Bootstrap Icons (ikon vector, lebih rapi & konsisten dibanding emoji) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --radius-lg: 18px;
            --radius-md: 14px;
            --shadow-soft: 0 4px 16px rgba(17, 24, 39, .06);
            --shadow-hover: 0 16px 32px rgba(17, 24, 39, .12);
        }

        body {
            background: #f4f6fb;
        }

        /* Header */
        .dashboard-header {
            background: linear-gradient(135deg, #c8102e, #e8505b);
            color: #fff;
            padding: 28px 32px;
            border-radius: var(--radius-lg);
            margin-bottom: 28px;
            box-shadow: 0 12px 28px rgba(200, 16, 46, .22);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .dashboard-header h2 {
            font-weight: 700;
            margin-bottom: 4px;
            letter-spacing: .2px;
        }

        .dashboard-header p {
            opacity: .92;
            font-size: 14.5px;
        }

        .dashboard-header .header-date {
            font-size: 13px;
            opacity: .85;
        }

        .btn-logout-header {
            background: rgba(255, 255, 255, .15);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 10px;
            padding: 9px 18px;
            font-size: 14px;
            font-weight: 600;
            transition: .25s;
            white-space: nowrap;
        }

        .btn-logout-header:hover {
            background: #fff;
            color: #c8102e;
        }

        /* Stat Card */
        .stat-card {
            border: none;
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: .3s;
            box-shadow: var(--shadow-soft);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-card .card-body {
            padding: 26px 28px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .stat-icon {
            width: 54px;
            height: 54px;
            min-width: 54px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-card h1 {
            font-size: 34px;
            font-weight: 700;
            margin: 0;
            line-height: 1.1;
        }

        .stat-card span.stat-label {
            font-size: 13.5px;
            opacity: .9;
            font-weight: 500;
        }

        .stat-card.bg-danger {
            background: linear-gradient(135deg, #c8102e, #e8505b) !important;
        }

        .stat-card.bg-success {
            background: linear-gradient(135deg, #198754, #38b27c) !important;
        }

        .stat-card.bg-primary {
            background: linear-gradient(135deg, #4338ca, #6366f1) !important;
        }

        .stat-card.bg-warning {
            background: linear-gradient(135deg, #9dff00, #bdc77c) !important;
        }

        /* Content */
        .distribution-card {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            padding: 22px 28px;
            margin-bottom: 28px;
        }

        .distribution-card h6 {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 14px;
        }

        .distribution-bar {
            display: flex;
            width: 100%;
            height: 12px;
            border-radius: 8px;
            overflow: hidden;
            background: #eef0f4;
            margin-bottom: 14px;
        }

        .distribution-bar span {
            height: 100%;
        }

        .distribution-legend {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
            font-size: 13.5px;
            color: #4b5563;
        }

        .distribution-legend .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }

        /* Menu Cards */
        .dashboard-menu {
            transition: .25s;
            cursor: pointer;
            border-radius: var(--radius-lg);
            border: 1px solid #eef0f4;
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .dashboard-menu:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: transparent;
        }

        .dashboard-menu .card-body {
            padding: 28px 26px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .menu-icon {
            width: 56px;
            height: 56px;
            min-width: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .menu-icon.icon-news {
            background: #fde8ec;
            color: #c8102e;
        }

        .menu-icon.icon-product {
            background: #e3f7ec;
            color: #198754;
        }

        .menu-icon.icon-gallery {
            background: #eaeaff;
            color: #4338ca;
        }

        .menu-icon.icon-company {
            background: #fff4e0;
            color: #c2780c;
        }

        .dashboard-menu h5 {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 4px;
            font-size: 16.5px;
        }

        .dashboard-menu small {
            color: #6c757d;
            font-size: 13px;
        }

        .menu-arrow {
            margin-left: auto;
            color: #c5c9d3;
            font-size: 18px;
            transition: .25s;
        }

        .dashboard-menu:hover .menu-arrow {
            transform: translateX(4px);
            color: #9ca3af;
        }

        .section-title {
            font-weight: 700;
            color: #1f2937;
            font-size: 16px;
            margin-bottom: 16px;
        }
    </style>

    {{-- ===== HEADER ===== --}}
    <div class="dashboard-header">
        <div>
            @php
                $hour = now()->format('H');
                $greeting =
                    $hour < 11
                        ? 'Selamat Pagi'
                        : ($hour < 15
                            ? 'Selamat Siang'
                            : ($hour < 18
                                ? 'Selamat Sore'
                                : 'Selamat Malam'));
            @endphp
            <h2>{{ $greeting }}, {{ session('user_name') }} 👋</h2>
            <p class="mb-1">Berikut ringkasan dan pengelolaan konten website Anda hari ini.</p>
            <div class="header-date">{{ now()->translatedFormat('l, d F Y') }}</div>
        </div>
        <a href="/logout" class="btn-logout-header">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>

    {{-- ===== STAT CARDS ===== --}}
    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card bg-danger text-white">
                <div class="card-body">
                    <div class="stat-icon"><i class="bi bi-newspaper"></i></div>
                    <div>
                        <h1>{{ $news }}</h1>
                        <span class="stat-label">Total Berita</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card stat-card bg-success text-white">
                <div class="card-body">
                    <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
                    <div>
                        <h1>{{ $product }}</h1>
                        <span class="stat-label">Total Produk</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card stat-card bg-primary text-white">
                <div class="card-body">
                    <div class="stat-icon"><i class="bi bi-images"></i></div>
                    <div>
                        <h1>{{ $gallery }}</h1>
                        <span class="stat-label">Total Galeri</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card stat-card bg-warning text-white">
                <div class="card-body">
                    <div class="stat-icon"><i class="bi bi-images"></i></div>
                    <div>
                        <h1>{{ $messages }}</h1>
                        <span class="stat-label">Total Pesan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== CONTENT DISTRIBUTION ===== --}}
    @php
        $total = max(1, $news + $product + $gallery);
        $newsPct = round(($news / $total) * 100, 1);
        $productPct = round(($product / $total) * 100, 1);
        $galleryPct = round(($gallery / $total) * 100, 1);
        $messages = round(($gallery / $total) * 100, 1);
    @endphp
    <div class="card distribution-card">
        <h6>Distribusi Konten</h6>
        <div class="distribution-bar">
            <span style="width: {{ $newsPct }}%; background:#c8102e;"></span>
            <span style="width: {{ $productPct }}%; background:#198754;"></span>
            <span style="width: {{ $galleryPct }}%; background:#4338ca;"></span>
            <span style="width: {{ $messages }}%; background:#4338ca;"></span>
        </div>
        <div class="distribution-legend">
            <span><i class="dot" style="background:#c8102e;"></i>Berita ({{ $newsPct }}%)</span>
            <span><i class="dot" style="background:#198754;"></i>Produk ({{ $productPct }}%)</span>
            <span><i class="dot" style="background:#4338ca;"></i>Galeri ({{ $galleryPct }}%)</span>
            <span><i class="dot" style="background:#ff0000;"></i>Pesan ({{ $messages }}%)</span>
        </div>
    </div>

    {{-- ===== MENU UTAMA ===== --}}
    <div class="section-title">Menu Pengelolaan</div>
    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <a href="/admin/news" class="text-decoration-none">
                <div class="card dashboard-menu h-100">
                    <div class="card-body">
                        <div class="menu-icon icon-news"><i class="bi bi-newspaper"></i></div>
                        <div>
                            <h5>Kelola Berita</h5>
                            <small>Tambah, Edit, Hapus Berita</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="/admin/products" class="text-decoration-none">
                <div class="card dashboard-menu h-100">
                    <div class="card-body">
                        <div class="menu-icon icon-product"><i class="bi bi-box-seam"></i></div>
                        <div>
                            <h5>Kelola Produk</h5>
                            <small>Data Produk Perusahaan</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="/admin/galleries" class="text-decoration-none">
                <div class="card dashboard-menu h-100">
                    <div class="card-body">
                        <div class="menu-icon icon-gallery"><i class="bi bi-images"></i></div>
                        <div>
                            <h5>Kelola Galeri</h5>
                            <small>Foto dan Dokumentasi</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="/admin/company-profiles" class="text-decoration-none">
                <div class="card dashboard-menu h-100">
                    <div class="card-body">
                        <div class="menu-icon icon-company"><i class="bi bi-building"></i></div>
                        <div>
                            <h5>Company Profile</h5>
                            <small>Data Perusahaan</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection
