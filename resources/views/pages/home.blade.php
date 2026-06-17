@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

        :root {
            --brand-red: #e63946;
            --brand-red-dark: #c1121f;
            --brand-green: #2d9d52;
            --brand-green-light: #52c873;
            --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* keyframe animasi */
        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes floatBubble {

            0%,
            100% {
                transform: translateY(0) translateX(0) scale(1);
            }

            50% {
                transform: translateY(-25px) translateX(15px) scale(1.08);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.85);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.5);
            }

            50% {
                box-shadow: 0 0 0 14px rgba(255, 255, 255, 0);
            }
        }

        @keyframes shimmerSweep {
            0% {
                transform: translateX(-150%) skewX(-15deg);
            }

            100% {
                transform: translateX(250%) skewX(-15deg);
            }
        }

        @keyframes bounceIcon {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes ctaGradient {
            0% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 200% 0%;
            }
        }

        @keyframes growLine {
            to {
                width: 70px;
            }
        }

        @keyframes floatProduct {

            0%,
            100% {
                transform: translateY(0) rotate(var(--fp-rot, -4deg));
            }

            50% {
                transform: translateY(-22px) rotate(calc(var(--fp-rot, -4deg) * -1));
            }
        }

        @keyframes riseBubble {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0;
            }

            12% {
                opacity: 0.65;
            }

            85% {
                opacity: 0.35;
            }

            100% {
                transform: translateY(-420px) scale(1.4);
                opacity: 0;
            }
        }

        @keyframes scrollCueMove {

            0%,
            100% {
                transform: translateY(0);
                opacity: 0.55;
            }

            50% {
                transform: translateY(8px);
                opacity: 1;
            }
        }

        /* Hero section */
        .hero-modern {
            height: 560px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            isolation: isolate;
            background: linear-gradient(120deg, var(--brand-red), var(--brand-red-dark), var(--brand-green), var(--brand-green-light));
            background-size: 300% 300%;
            animation: gradientFlow 12s ease infinite;
        }

        .hero-modern .overlay {
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(circle at 15% 30%, rgba(255, 255, 255, 0.18) 0, transparent 22%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.15) 0, transparent 18%),
                radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.12) 0, transparent 25%),
                radial-gradient(circle at 25% 85%, rgba(255, 255, 255, 0.14) 0, transparent 20%);
            animation: floatBubble 9s ease-in-out infinite;
        }

        .hero-modern .content {
            position: relative;
            z-index: 1;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .hero-modern .display-3 {
            font-weight: 800;
            text-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            animation: fadeInUp 0.9s ease both;
        }

        .hero-modern h4 {
            font-weight: 300;
            letter-spacing: 1px;
            animation: fadeInUp 0.9s ease 0.2s both;
        }

        .hero-modern .lead {
            opacity: 0.95;
            animation: fadeInUp 0.9s ease 0.4s both;
        }

        .hero-btn {
            position: relative;
            overflow: hidden;
            font-weight: 600;
            border-radius: 50px;
            padding: 12px 36px;
            transition: transform 0.3s ease, color 0.3s ease;
            animation: fadeInUp 0.9s ease 0.6s both, pulseGlow 2.6s ease-in-out infinite;
        }

        .hero-btn:hover {
            transform: translateY(-4px) scale(1.05);
            color: var(--brand-red-dark);
        }

        .hero-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 40%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(220, 53, 69, 0.25), transparent);
            animation: shimmerSweep 3s ease-in-out infinite;
        }

        /* Gelembung-gelembung yang naik perlahan */
        .hero-bubbles {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .hero-bubbles span {
            position: absolute;
            bottom: -60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.35);
            animation: riseBubble linear infinite;
        }

        .hero-bubbles span:nth-child(1) {
            left: 6%;
            width: 10px;
            height: 10px;
            animation-duration: 7s;
            animation-delay: 0s;
        }

        .hero-bubbles span:nth-child(2) {
            left: 18%;
            width: 16px;
            height: 16px;
            animation-duration: 9.5s;
            animation-delay: 1.2s;
        }

        .hero-bubbles span:nth-child(3) {
            left: 32%;
            width: 7px;
            height: 7px;
            animation-duration: 6s;
            animation-delay: 2.4s;
        }

        .hero-bubbles span:nth-child(4) {
            left: 48%;
            width: 13px;
            height: 13px;
            animation-duration: 8.5s;
            animation-delay: 0.6s;
        }

        .hero-bubbles span:nth-child(5) {
            left: 63%;
            width: 9px;
            height: 9px;
            animation-duration: 7.5s;
            animation-delay: 3s;
        }

        .hero-bubbles span:nth-child(6) {
            left: 77%;
            width: 15px;
            height: 15px;
            animation-duration: 10s;
            animation-delay: 1.8s;
        }

        .hero-bubbles span:nth-child(7) {
            left: 88%;
            width: 8px;
            height: 8px;
            animation-duration: 6.8s;
            animation-delay: 4s;
        }

        .hero-bubbles span:nth-child(8) {
            left: 95%;
            width: 12px;
            height: 12px;
            animation-duration: 9s;
            animation-delay: 2.8s;
        }

        /* Gambar produk mengambang */
        .hero-floating-products {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
        }

        .floating-product {
            position: absolute;
            transition: transform 0.25s ease-out;
            will-change: transform;
        }

        .floating-product .fp-inner {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0) 72%);
            animation: floatProduct 6s ease-in-out infinite;
        }

        .floating-product img {
            width: 78%;
            height: 78%;
            object-fit: contain;
            filter: drop-shadow(0 14px 18px rgba(0, 0, 0, 0.3));
        }

        .floating-product.fp-1 {
            top: 10%;
            left: 6%;
            width: 90px;
            height: 90px;
            --fp-rot: -6deg;
        }

        .floating-product.fp-1 .fp-inner {
            animation-duration: 6.5s;
        }

        .floating-product.fp-2 {
            top: 14%;
            right: 8%;
            width: 110px;
            height: 110px;
            --fp-rot: 5deg;
        }

        .floating-product.fp-2 .fp-inner {
            animation-duration: 7.5s;
            animation-delay: 0.4s;
        }

        .floating-product.fp-3 {
            bottom: 16%;
            left: 4%;
            width: 95px;
            height: 95px;
            --fp-rot: 4deg;
        }

        .floating-product.fp-3 .fp-inner {
            animation-duration: 7s;
            animation-delay: 0.9s;
        }

        .floating-product.fp-4 {
            bottom: 12%;
            right: 6%;
            width: 80px;
            height: 80px;
            --fp-rot: -5deg;
        }

        .floating-product.fp-4 .fp-inner {
            animation-duration: 8s;
            animation-delay: 0.2s;
        }

        .floating-product.fp-5 {
            top: 50%;
            left: 1.5%;
            width: 65px;
            height: 65px;
            --fp-rot: 6deg;
        }

        .floating-product.fp-5 .fp-inner {
            animation-duration: 6.8s;
            animation-delay: 1.4s;
        }

        /* Scroll cue inviting visitors further down the page */
        .hero-scroll-cue {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            opacity: 0.85;
            animation: fadeInUp 0.9s ease 0.9s both;
        }

        .hero-scroll-cue:hover {
            color: #fff;
            opacity: 1;
        }

        .hero-scroll-cue .chevron {
            font-size: 1rem;
            line-height: 1;
            animation: scrollCueMove 1.8s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .hero-modern {
                height: 460px;
            }

            .hero-modern .display-3 {
                font-size: 2.2rem;
            }

            .floating-product {
                transform: none !important;
            }

            .floating-product.fp-1 {
                width: 56px;
                height: 56px;
                top: 8%;
                left: 4%;
            }

            .floating-product.fp-2 {
                width: 60px;
                height: 60px;
                top: 10%;
                right: 4%;
            }

            .floating-product.fp-3,
            .floating-product.fp-4,
            .floating-product.fp-5 {
                display: none;
            }
        }

        /* Heading - cross */
        h2.fw-bold {
            position: relative;
            display: inline-block;
            padding-bottom: 14px;
            font-family: 'Poppins', sans-serif;
            animation: fadeInUp 0.6s ease both;
        }

        h2.fw-bold::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 4px;
            border-radius: 4px;
            transform: translateX(-50%);
            background: linear-gradient(90deg, var(--brand-red), var(--brand-green));
            animation: growLine 1s ease 0.3s forwards;
        }

        /* Produk Unggulan */
        .produk-card img {
            height: 200px;
            object-fit: contain;
            transition: transform 0.45s ease, filter 0.45s ease;
        }

        .produk-card {
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            animation: fadeInUp 0.7s ease both;
        }

        .row.g-4>.col-md-4.col-6:nth-child(1) .produk-card {
            animation-delay: 0.05s;
        }

        .row.g-4>.col-md-4.col-6:nth-child(2) .produk-card {
            animation-delay: 0.15s;
        }

        .row.g-4>.col-md-4.col-6:nth-child(3) .produk-card {
            animation-delay: 0.25s;
        }

        .row.g-4>.col-md-4.col-6:nth-child(4) .produk-card {
            animation-delay: 0.35s;
        }

        .row.g-4>.col-md-4.col-6:nth-child(5) .produk-card {
            animation-delay: 0.45s;
        }

        .row.g-4>.col-md-4.col-6:nth-child(6) .produk-card {
            animation-delay: 0.55s;
        }

        .produk-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
        }

        .produk-card:hover img {
            transform: scale(1.08) rotate(-1deg);
        }

        .produk-card h5 {
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .produk-card:hover h5 {
            color: var(--brand-red-dark) !important;
        }

        /* Berita/News */
        section.py-5:not(.bg-white):not(.bg-light) .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            animation: fadeInUp 0.7s ease both;
        }

        section.py-5:not(.bg-white):not(.bg-light) .row>div:nth-child(1) .card {
            animation-delay: 0.1s;
        }

        section.py-5:not(.bg-white):not(.bg-light) .row>div:nth-child(2) .card {
            animation-delay: 0.25s;
        }

        section.py-5:not(.bg-white):not(.bg-light) .row>div:nth-child(3) .card {
            animation-delay: 0.4s;
        }

        section.py-5:not(.bg-white):not(.bg-light) .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.15) !important;
        }

        section.py-5:not(.bg-white):not(.bg-light) .card-img-top {
            transition: transform 0.5s ease;
        }

        section.py-5:not(.bg-white):not(.bg-light) .card:hover .card-img-top {
            transform: scale(1.1);
        }

        section.py-5:not(.bg-white):not(.bg-light) .btn-danger {
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, var(--brand-red), var(--brand-red-dark));
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        section.py-5:not(.bg-white):not(.bg-light) .btn-danger:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 16px rgba(220, 53, 69, 0.35);
        }

        /* Gallery kegiatan */
        .img-fluid.rounded.shadow {
            cursor: pointer;
            transition: transform 0.45s ease, filter 0.45s ease;
            animation: fadeInScale 0.7s ease both;
        }

        .col-md-4.mb-4:nth-child(1) .img-fluid.rounded.shadow {
            animation-delay: 0.05s;
        }

        .col-md-4.mb-4:nth-child(2) .img-fluid.rounded.shadow {
            animation-delay: 0.15s;
        }

        .col-md-4.mb-4:nth-child(3) .img-fluid.rounded.shadow {
            animation-delay: 0.25s;
        }

        .col-md-4.mb-4:nth-child(4) .img-fluid.rounded.shadow {
            animation-delay: 0.35s;
        }

        .col-md-4.mb-4:nth-child(5) .img-fluid.rounded.shadow {
            animation-delay: 0.45s;
        }

        .col-md-4.mb-4:nth-child(6) .img-fluid.rounded.shadow {
            animation-delay: 0.55s;
        }

        .img-fluid.rounded.shadow:hover {
            transform: scale(1.04) translateY(-6px);
            filter: brightness(1.05) saturate(1.15);
            box-shadow: 0 18px 30px rgba(0, 0, 0, 0.2) !important;
        }

        /* Keunggulan kami */
        .col-md-4>h5.text-danger {
            font-size: 1.3rem;
            display: inline-block;
            animation: bounceIcon 2.8s ease-in-out infinite;
        }

        .col-md-4:nth-child(2)>h5.text-danger {
            animation-delay: 0.3s;
        }

        .col-md-4:nth-child(3)>h5.text-danger {
            animation-delay: 0.6s;
        }

        /* CTA */
        .cta-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(270deg, var(--brand-green), var(--brand-green-light), var(--brand-red), var(--brand-red-dark));
            background-size: 400% 400%;
            animation: ctaGradient 10s linear infinite alternate;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.15) 0, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.12) 0, transparent 35%);
            animation: floatBubble 8s ease-in-out infinite;
        }

        .cta-section .container {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-family: 'Poppins', sans-serif;
            animation: fadeInUp 0.7s ease both;
        }

        .cta-section p {
            animation: fadeInUp 0.7s ease 0.15s both;
        }

        .cta-section .btn-light {
            position: relative;
            overflow: hidden;
            border-radius: 50px;
            font-weight: 600;
            padding: 12px 38px;
            transition: transform 0.3s ease;
            animation: fadeInUp 0.7s ease 0.3s both, pulseGlow 2.6s ease-in-out infinite;
        }

        .cta-section .btn-light:hover {
            transform: translateY(-4px) scale(1.06);
        }

        /* Accesibility */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
    {{-- HERO --}}
    <section class="hero-modern text-center" id="heroSection">
        <div class="overlay"></div>

        <div class="hero-bubbles" aria-hidden="true">
            <span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span>
        </div>

        @php
            $heroProducts = $products->filter(fn($p) => $p->gambar)->take(5)->values();
        @endphp
        <div class="hero-floating-products" aria-hidden="true">
            @foreach ($heroProducts as $i => $product)
                <div class="floating-product fp-{{ $i + 1 }}" data-depth="{{ 0.25 + $i * 0.12 }}">
                    <div class="fp-inner">
                        <img src="{{ asset('uploads/products/' . $product->gambar) }}" alt="{{ $product->nama }}"
                            loading="lazy">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container content">
            {{-- <h1 class="display-3 fw-bold">
                {{ $company->nama_perusahaan }}
            </h1> --}}

            <h1 class="display-3 fw-bold">
                Menginspirasi Kehidupan Melalui Produk Berkualitas
            </h1>

            <h5>
                Berkomitmen menghadirkan inovasi, kualitas, dan cita rasa terbaik untuk Indonesia dan dunia.
            </h5>

            <p class="lead">
                Temukan berbagai produk unggulan ABC President Indonesia.
            </p>
            <br>
            <br>
            <a href="{{ url('/product') }}" class="btn btn-light btn-lg mt-3 hero-btn">
                Lihat Produk
            </a>
        </div>

    </section>

    <script>
        (function() {
            var hero = document.getElementById('heroSection');
            var floaters = hero ? hero.querySelectorAll('.floating-product') : [];
            var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (!hero || !floaters.length || reduceMotion || window.matchMedia('(max-width: 768px)').matches) {
                return;
            }

            hero.addEventListener('mousemove', function(e) {
                var rect = hero.getBoundingClientRect();
                var cx = rect.width / 2;
                var cy = rect.height / 2;
                var mx = e.clientX - rect.left - cx;
                var my = e.clientY - rect.top - cy;

                floaters.forEach(function(el) {
                    var depth = parseFloat(el.getAttribute('data-depth')) || 0.3;
                    var x = (mx / cx) * 18 * depth;
                    var y = (my / cy) * 18 * depth;
                    el.style.transform = 'translate(' + x.toFixed(1) + 'px, ' + y.toFixed(1) + 'px)';
                });
            });

            hero.addEventListener('mouseleave', function() {
                floaters.forEach(function(el) {
                    el.style.transform = 'translate(0, 0)';
                });
            });
        })();
    </script>
    {{-- BERITA TERBARU --}}
    <section class="py-5">

        <div class="container">

            <h2 class="fw-bold text-center text-danger mb-5">
                Berita Terbaru
            </h2>

            <div class="row">

                @foreach ($news as $item)
                    <div class="col-md-4">

                        <div class="card shadow h-100">

                            <img src="{{ asset('uploads/news/' . $item->image) }}" class="card-img-top"
                                style="height:220px;object-fit:cover;">

                            <div class="card-body">

                                <h5>{{ $item->title }}</h5>

                                <p>
                                    {{ Str::limit($item->content, 100) }}
                                </p>

                                <a href="/news/{{ $item->slug }}" class="btn btn-danger">

                                    Detail

                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
    {{-- PRODUK --}}
    <section class="py-5 bg-white" id="produk-unggulan">
        <div class="container text-center">
            <h2 class="fw-bold mb-5 text-danger">Produk Unggulan</h2>

            <div class="row g-4">

                @foreach ($products as $product)
                    <div class="col-md-4 col-6">

                        <div class="card produk-card text-center h-100 shadow border-0">

                            @if ($product->gambar)
                                <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="card-img-top p-3">
                            @endif

                            <div class="card-body">

                                <h5 class="text-success">
                                    {{ $product->nama }}
                                </h5>

                                <p class="small">
                                    {{ $product->jenis_produk }}
                                </p>

                                <small>
                                    {{ $product->tipe_produk }}
                                </small>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- GALERI --}}
    <section class="py-5 bg-light">

        <div class="container">

            <h2 class="fw-bold text-center text-success mb-5">
                Galeri Kegiatan
            </h2>

            <div class="row">

                @foreach ($galleries as $gallery)
                    <div class="col-md-4 mb-4">

                        <img src="{{ asset('uploads/galleries/' . $gallery->gambar) }}" class="img-fluid rounded shadow">

                    </div>
                @endforeach

            </div>

        </div>

    </section>
    {{-- KEUNGGULAN --}}
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-4 text-success">Keunggulan Kami</h2>

            <div class="row g-4">
                @foreach ([['🌱', 'Bahan Alami', 'Diproduksi dari bahan berkualitas'], ['🏭', 'Produksi Modern', 'Teknologi higienis'], ['🌍', 'Distribusi Luas', 'Seluruh Indonesia']] as $k)
                    <div class="col-md-4">
                        <h5 class="text-danger">{{ $k[0] }} {{ $k[1] }}</h5>
                        <p class="small">{{ $k[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- CTA --}}
    <section class="cta-section text-white text-center py-5">
        <div class="container">
            <h2 class="fw-bold">Rasakan Kesegarannya Sekarang</h2>
            <p>Temukan produk kami di toko terdekat</p>
            <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">Hubungi Kami</a>

        </div>
    </section>
@endsection
