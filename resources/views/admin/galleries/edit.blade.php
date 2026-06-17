@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏️ Edit Galeri
            </h4>

        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="/admin/galleries/{{ $gallery->id }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $gallery->judul }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Event</label>
                    <input type="text" name="event" class="form-control" value="{{ $gallery->event }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Event</label>
                    <input type="date" name="tanggal_event" class="form-control" value="{{ $gallery->tanggal_event }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat Event</label>
                    <input type="text" name="tempat" class="form-control" value="{{ $gallery->tempat }}">
                </div>



                @if ($gallery->gambar)
                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <br>

                        <img src="{{ asset('uploads/galleries/' . $gallery->gambar) }}" class="img-thumbnail"
                            width="200">

                    </div>
                @endif

                <div class="mb-4">

                    <label class="form-label">
                        Ganti Gambar
                    </label>

                    <input type="file" name="gambar" class="form-control">

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Update Galeri

                </button>

                <a href="/admin/galleries" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
