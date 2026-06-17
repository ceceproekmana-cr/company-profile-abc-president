@extends('admin.layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                📦 Data Produk
            </h4>

            <div>

                <a href="/admin/products/pdf" class="btn btn-warning btn-sm">

                    📄 Export PDF

                </a>

                <a href="/admin/products/create" class="btn btn-light btn-sm">

                    ➕ Tambah Produk

                </a>

            </div>

        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif

            <div class="table-responsive">
                <form method="GET" class="mb-3">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text" name="keyword" class="form-control" placeholder="Cari produk..."
                                value="{{ request('keyword') }}">

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary">
                                🔍 Cari
                            </button>

                        </div>

                    </div>

                </form>

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">

                        <tr>
                            <th width="60">ID</th>
                            <th width="120">Gambar</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Tipe</th>
                            <th width="100">Unggulan</th>
                            <th>Deskripsi</th>
                            <th width="180">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($products as $product)
                            <tr>

                                <td>
                                    {{ $product->id }}
                                </td>

                                <td>

                                    @if ($product->gambar)
                                        <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="img-thumbnail"
                                            width="80">
                                    @endif

                                </td>

                                <td>
                                    <strong>{{ $product->nama }}</strong>
                                </td>

                                <td>
                                    {{ $product->jenis_produk }}
                                </td>

                                <td>
                                    {{ $product->tipe_produk }}
                                </td>

                                <td>

                                    @if ($product->is_featured)
                                        <span class="badge bg-success">
                                            ⭐ Ya
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Tidak
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    {{ Str::limit($product->deskripsi, 80) }}

                                </td>

                                <td>

                                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="/admin/products/{{ $product->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus produk?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center">

                                    Belum ada data produk

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $products->links() }}
                </div>

            </div>

        </div>

    </div>
@endsection
