@extends('admin.layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                📰 Data Berita
            </h4>

            <a href="/admin/news/create" class="btn btn-light btn-sm">

                ➕ Tambah Berita

            </a>

        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">

                        <tr>

                            <th width="60">ID</th>
                            <th width="120">Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Slug</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($news as $item)
                            <tr>

                                <td>
                                    {{ $item->id }}
                                </td>

                                <td>

                                    @if ($item->image)
                                        <img src="{{ asset('uploads/news/' . $item->image) }}" class="img-thumbnail"
                                            width="90">
                                    @endif

                                </td>

                                <td>

                                    <strong>
                                        {{ $item->title }}
                                    </strong>

                                </td>

                                <td>

                                    {{ $item->category->nama ?? '-' }}

                                </td>

                                <td>

                                    {{ $item->author }}

                                </td>

                                <td>

                                    {{ $item->date }}

                                </td>

                                <td>

                                    <small>
                                        {{ $item->slug }}
                                    </small>

                                </td>

                                <td>

                                    <a href="/admin/news/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="/admin/news/{{ $item->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus berita?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center">

                                    Belum ada data berita

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
