@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-warning text-dark">

            <h4 class="mb-0">
                ✏ Edit Berita
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

            <form action="/admin/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Penulis
                    </label>

                    <input type="text" name="author" class="form-control" value="{{ old('author', $news->author) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="category_id" class="form-select">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>

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

                            <input type="date" name="date" class="form-control" value="{{ $news->date }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Publish At
                            </label>

                            <input type="datetime-local" name="published_at" class="form-control"
                                value="{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('Y-m-d\TH:i') : '' }}">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Meta Description
                    </label>

                    <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $news->meta_description) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="content" rows="8" class="form-control">{{ old('content', $news->content) }}</textarea>

                </div>

                @if ($news->image)
                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <br>

                        <img src="{{ asset('uploads/news/' . $news->image) }}" class="img-thumbnail" width="250">

                    </div>
                @endif

                <div class="mb-4">

                    <label class="form-label">
                        Ganti Gambar
                    </label>

                    <input type="file" name="image" class="form-control">

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Update Berita

                </button>

                <a href="/admin/news" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
