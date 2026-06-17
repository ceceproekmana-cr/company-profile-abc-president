@extends('layouts.app')

@section('content')
    <style>
        .about-hero {
            background: linear-gradient(135deg, #ff0019, #ff6b6b);
            color: white;
            padding: 60px;
            border-radius: 25px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(255, 0, 25, .25);
        }

        .about-hero h1 {
            font-size: 48px;
            font-weight: 700;
        }

        .about-hero p {
            font-size: 18px;
            opacity: .9;
        }

        .card.shadow {
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .08) !important;
        }

        .company-logo {
            border-radius: 20px;
            transition: .3s;
        }

        .company-logo:hover {
            transform: scale(1.03);
        }

        .company-title {
            color: #212529;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #dc3545;
            padding: 12px 18px;
            margin-bottom: 12px;
            border-radius: 12px;
        }

        .vision-card {
            border-radius: 20px;
            overflow: hidden;
            transition: .3s;
        }

        .vision-card:hover {
            transform: translateY(-5px);
        }

        .vision-header {
            background: linear-gradient(135deg, #ff0019, #ff6b6b);
            color: white;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
        }

        .mission-header {
            background: linear-gradient(135deg, #198754, #42d392);
            color: white;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
        }

        .about-text {
            text-align: justify;
            line-height: 1.9;
            font-size: 16px;
            color: #495057;
        }

        .company-card {
            position: relative;

            background:
                linear-gradient(135deg,
                    #ffffff,
                    #fff8f8);

            border: none;
            border-radius: 25px;
            overflow: hidden;
        }

        .company-card::before {
            content: "";

            position: absolute;
            inset: 0;

            background:
                url('{{ asset('logoABC.png') }}') center center no-repeat;

            background-size: 700px;

            opacity: .03;

            pointer-events: none;
        }

        pointer-events: none;
        }

        .company-card .card-body {
            position: relative;
            z-index: 2;
        }
    </style>

    <body>

    </body>

    <div class="about-hero">
        <div>
            <h1>Tentang PT. ABC President Indonesia</h1>
            <p>
                Perusahaan makanan dan minuman terkemuka di Indonesia sejak 1991
            </p>
        </div>
    </div>
    <div class="card shadow company-card">
        <div class="card-body">

            <h1 class="mb-4">About Us</h1>

            {{-- PROFILE --}}
            <div class="row mb-5">

                <div class="col-md-5">
                    <img src="{{ asset('uploads/company/' . $company->logo) }}" class="img-fluid company-logo shadow"
                        alt="{{ $company->nama_perusahaan }}">
                </div>

                <div class="col-md-7">

                    <h2 class="company-title">
                        {{ $company->nama_perusahaan }}
                    </h2>

                    <div class="about-text">
                        {!! nl2br(e($company->tentang)) !!}
                    </div>

                    <div class="info-box">
                        📍 {{ $company->alamat }}
                    </div>

                    <div class="info-box">
                        ☎ {{ $company->telepon }}
                    </div>

                    <div class="info-box">
                        ✉ {{ $company->email }}
                    </div>

                </div>

            </div>

            {{-- VISI MISI --}}
            <div class="row">

                <div class="col-md-6 mb-4">

                    <div class="card vision-card shadow border-0 h-100">

                        <div class="vision-header">
                            🎯 Visi
                        </div>

                        <div class="card-body">

                            <p style="text-align:justify;">
                                {{ $company->visi }}
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="card vision-card shadow border-0 h-100">

                        <div class="mission-header">
                            🚀 Misi
                        </div>

                        <div class="card-body">

                            <p style="text-align:justify;">
                                {{ $company->misi }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
