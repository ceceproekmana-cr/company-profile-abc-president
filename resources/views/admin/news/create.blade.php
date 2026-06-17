@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white">

            <h4 class="mb-0">
                📰 Tambah Berita
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

            <form action="/admin/news" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Penulis
                    </label>

                    <input type="text" name="author" class="form-control" value="{{ old('author') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="category_id" class="form-select">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->nama }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Tanggal Berita
                            </label>

                            <input type="date" name="date" class="form-control">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Publish At
                            </label>

                            <input type="datetime-local" name="published_at" class="form-control">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Meta Description (SEO)
                    </label>

                    <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="content" rows="8" class="form-control">{{ old('content') }}</textarea>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Gambar Berita
                    </label>

                    <input type="file" name="image" class="form-control">

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Simpan Berita

                </button>

                <a href="/admin/news" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
