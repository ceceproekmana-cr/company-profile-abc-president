@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-5">
            Galeri Perusahaan
        </h1>

        <div class="row">

            @forelse($galleries as $gallery)
                <div class="col-md-4 mb-4">

                    <div class="card shadow border-0 h-100">

                        <img src="{{ asset('uploads/galleries/' . $gallery->gambar) }}" class="card-img-top">

                        <div class="card-body">

                            <h5>{{ $gallery->judul }}</h5>

                            <p class="text-danger fw-bold">
                                {{ $gallery->event }}
                            </p>

                            <small>
                                📅 {{ date('d M Y', strtotime($gallery->tanggal_event)) }}
                            </small>

                            <br>

                            <small>
                                📍 {{ $gallery->tempat }}
                            </small>

                            {{-- <p class="mt-2">
                                {{ Str::limit($gallery->keterangan, 80) }}
                            </p> --}}

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        Belum ada data galeri.

                    </div>

                </div>
            @endforelse

        </div>

    </div>
@endsection
