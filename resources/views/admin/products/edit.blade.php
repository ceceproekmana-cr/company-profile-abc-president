@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏ Edit Produk
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

            <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Produk
                    </label>

                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $product->nama) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Jenis Produk
                    </label>

                    <input type="text" name="jenis_produk" class="form-control"
                        value="{{ old('jenis_produk', $product->jenis_produk) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipe Produk
                    </label>

                    <input type="text" name="tipe_produk" class="form-control"
                        value="{{ old('tipe_produk', $product->tipe_produk) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi Produk
                    </label>

                    <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Produk
                    </label>

                    <input type="file" name="gambar" class="form-control">

                </div>

                @if ($product->gambar)
                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <br>

                        <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="img-thumbnail" width="180">

                    </div>
                @endif

                <div class="form-check mb-4">

                    <input type="checkbox" class="form-check-input" name="is_featured" value="1"
                        {{ $product->is_featured ? 'checked' : '' }}>

                    <label class="form-check-label">

                        ⭐ Produk Unggulan

                    </label>

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Update Produk

                </button>

                <a href="/admin/products" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
