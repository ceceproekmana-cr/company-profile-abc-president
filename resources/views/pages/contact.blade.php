@extends('layouts.app')

@section('content')
    <style>
        .contact-hero {
            background: linear-gradient(135deg, #ff0019, #ff6b6b);
            color: white;
            padding: 60px;
            border-radius: 25px;
            margin-bottom: 40px;
        }

        /* === Kirim Pesan form === */
        .contact-form-card {
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .contact-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(180deg, #ff0019, #ff6b6b);
        }

        .contact-form-card .card-body {
            padding: 2.5rem 2.5rem 2.5rem 3rem;
        }

        .form-label-modern {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 0.4rem;
        }

        .contact-form-card .form-control {
            border: 1.5px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            background-color: #fafafa;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease;
        }

        .contact-form-card .form-control:focus {
            border-color: #ff0019;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 0, 25, 0.08);
            outline: none;
        }

        .contact-form-card .form-control::placeholder {
            color: #b0b0b0;
        }

        .contact-form-card textarea.form-control {
            resize: vertical;
            min-height: 140px;
        }

        .btn-send {
            background: linear-gradient(135deg, #ff0019, #ff6b6b);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.8rem 2.4rem;
            border-radius: 50px;
            letter-spacing: 0.02em;
            box-shadow: 0 4px 14px rgba(255, 0, 25, 0.25);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(255, 0, 25, 0.35);
            color: #fff;
        }

        .btn-send:active {
            transform: translateY(0);
        }

        @media (max-width: 576px) {
            .contact-form-card .card-body {
                padding: 1.75rem;
            }
        }
    </style>

    <div class="contact-hero text-center mb-5">
        <h1>Hubungi Kami</h1>
        <p>
            Kami siap menerima pertanyaan,
            masukan, dan kerja sama bisnis.
        </p>
    </div>

    <div class="row mb-5">

        <div class="col-md-6">
            <div class="card shadow border-0 h-100">
                <div class="card-body">
                    <h4 class="text-danger">🏢 Kantor Pusat</h4>
                    <hr>
                    <p>Head Office</p>
                    <p>EightyEight @Kasablanka Office, Tower A Lantai 31 Unit A-H</p>
                    <p>Jl. Casablanca Raya Kav. 88, Jakarta Selatan 12870.</p>
                    <p>☎ +6221-29820168</p>
                    <p>📠 +6221-29820168</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow border-0 h-100">
                <div class="card-body">
                    <h4 class="text-success">🏭 Pabrik Karawang</h4>
                    <hr>
                    <p>Factory</p>
                    <p>Desa Walahar</p>
                    <p>Kec.Klari Karawang Timur, 41371</p>
                    <p>Jawa Barat, Indonesia</p>
                    <p>☎ +62 267-431422</p>
                    <p>📠 +62 267-431422</p>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card shadow border-0 contact-form-card">
                <div class="card-body">

                    <h3 class="mb-4 text-danger">📩 Kirim Pesan</h3>
                    @if (session('success'))
                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>
                    @endif

                    <form action="/contact/send" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label-modern">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label-modern">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern">Subjek</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subjek pesan">
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">Pesan</label>
                            <textarea name="message" rows="5" class="form-control" placeholder="Tulis pesan Anda..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-send">Kirim Pesan</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
