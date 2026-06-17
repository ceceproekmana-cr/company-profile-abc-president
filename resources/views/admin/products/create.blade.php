@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white">

            <h4 class="mb-0">
                ➕ Tambah Produk
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

            <form action="/admin/products" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nama Produk
                    </label>

                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Jenis Produk
                    </label>

                    <input type="text" name="jenis_produk" class="form-control" value="{{ old('jenis_produk') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipe Produk
                    </label>

                    <input type="text" name="tipe_produk" class="form-control" value="{{ old('tipe_produk') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Produk
                    </label>

                    <input type="file" name="gambar" class="form-control">

                </div>

                <div class="form-check mb-4">

                    <input type="checkbox" class="form-check-input" name="is_featured" value="1">

                    <label class="form-check-label">

                        ⭐ Jadikan Produk Unggulan

                    </label>

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Simpan Produk

                </button>

                <a href="/admin/products" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
