@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🖼️ Tambah Galeri
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

            <form action="/admin/galleries" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Judul Galeri
                    </label>

                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}"
                        placeholder="Masukkan Judul Galeri">

                </div>

                <div class="mb-3">
                    <label>Nama Event</label>
                    <input type="text" name="event" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Event</label>
                    <input type="date" name="tanggal_event" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tempat Event</label>
                    <input type="text" name="tempat" class="form-control">
                </div>

                {{-- <div class="mb-3">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <textarea name="keterangan" rows="5" class="form-control" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>

                </div> --}}

                <div class="mb-4">

                    <label class="form-label">
                        Upload Gambar
                    </label>

                    <input type="file" name="gambar" class="form-control">

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Simpan Galeri

                </button>

                <a href="/admin/galleries" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
