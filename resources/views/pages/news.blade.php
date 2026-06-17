@extends('layouts.app')

@section('content')
    <style>
        .news-card {
            border-radius: 20px;
            overflow: hidden;
            transition: .3s;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15) !important;
        }

        .news-card img {
            height: 220px;
            object-fit: cover;
        }

        .news-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .news-title h1 {
            color: #dc3545;
            font-weight: 700;
        }
    </style>
    <div class="news-title">

        <h1>
            Berita & Informasi
        </h1>

        <p class="text-muted">
            Update terbaru kegiatan dan perkembangan PT. ABC President Indonesia
        </p>

    </div>

    <div class="row g-4">
        @foreach ($news as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{ asset('uploads/news/' . $item->image) }}" class="card-img-top"
                        style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h5>{{ $item->title }}</h5>
                        <p>{{ Str::limit($item->content, 80) }}</p>

                        <!-- 🔥 tombol detail -->
                        <a href="/news/{{ $item->slug }}">
                            Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
