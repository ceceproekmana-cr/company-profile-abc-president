@extends('admin.layouts.app')

@section('content')

    <div class="card shadow border-0">

        <div class="card-header bg-warning text-dark">

            <h4 class="mb-0">
                ✏️ Edit Profil Perusahaan
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

            <form action="/admin/company-profiles/{{ $company->id }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Perusahaan
                    </label>

                    <input type="text" name="nama_perusahaan" class="form-control"
                        value="{{ old('nama_perusahaan', $company->nama_perusahaan) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tentang Perusahaan
                    </label>

                    <textarea name="tentang" rows="6" class="form-control">{{ old('tentang', $company->tentang) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Visi
                    </label>

                    <textarea name="visi" rows="4" class="form-control">{{ old('visi', $company->visi) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Misi
                    </label>

                    <textarea name="misi" rows="4" class="form-control">{{ old('misi', $company->misi) }}</textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Telepon
                            </label>

                            <input type="text" name="telepon" class="form-control"
                                value="{{ old('telepon', $company->telepon) }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $company->email) }}">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $company->alamat) }}</textarea>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Logo Saat Ini
                    </label>

                    <br>

                    @if ($company->logo)
                        <img src="{{ asset('uploads/company/' . $company->logo) }}" class="img-thumbnail mb-3"
                            width="180">
                    @else
                        <p class="text-muted">
                            Belum ada logo
                        </p>
                    @endif

                    <input type="file" name="logo" class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti logo.
                    </small>

                </div>

                <button type="submit" class="btn btn-success">

                    💾 Update Profil

                </button>

                <a href="/admin/company-profiles" class="btn btn-secondary">

                    ← Kembali

                </a>

            </form>

        </div>

    </div>

@endsection
