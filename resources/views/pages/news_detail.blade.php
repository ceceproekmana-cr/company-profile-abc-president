@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card shadow">

                    <img src="{{ asset('uploads/news/' . $news->image) }}" class="card-img-top"
                        style="height:300px; object-fit:cover;">


                    <div class="card-body">

                        <h2 class="fw-bold">{{ $news->title }}</h2>

                        <p class="text-muted">
                            {{ \Carbon\Carbon::parse($news->date)->format('d M Y') }}
                        </p>

                        <hr>

                        <p style="text-align:justify;">
                            {{ $news->content }}
                        </p>

                        <a href="/news" class="btn btn-secondary mt-3">
                            ← Back
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
