@extends('admin.layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                🖼️ Data Galeri
            </h4>

            <a href="/admin/galleries/create" class="btn btn-light btn-sm">

                ➕ Tambah Galeri

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

                    <thead class="table-primary">

                        <tr>

                            <th width="70">ID</th>
                            <th width="150">Gambar</th>
                            <th>Judul</th>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($galleries as $gallery)
                            <tr>

                                <td>
                                    {{ $gallery->id }}
                                </td>

                                <td>

                                    @if ($gallery->gambar)
                                        <img src="{{ asset('uploads/galleries/' . $gallery->gambar) }}"
                                            class="img-thumbnail" width="120">
                                    @endif

                                </td>

                                <td>

                                    <strong>
                                        {{ $gallery->judul }}
                                    </strong>

                                </td>

                                <td>{{ $gallery->event }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($gallery->tanggal_event)->translatedFormat('d F Y') }}
                                </td>
                                <td>{{ $gallery->tempat }}</td>



                                <td>

                                    <a href="/admin/galleries/{{ $gallery->id }}/edit" class="btn btn-warning btn-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="/admin/galleries/{{ $gallery->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus galeri ini?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    Belum ada data galeri

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
