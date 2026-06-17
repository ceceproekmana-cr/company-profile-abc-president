@extends('admin.layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                🏢 Company Profile
            </h4>

            <a href="/admin/company-profiles/create" class="btn btn-light btn-sm">

                ➕ Tambah Profil

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

                            <th width="120">Logo</th>

                            <th>Nama Perusahaan</th>

                            <th>Alamat</th>

                            <th>Telepon</th>

                            <th>Email</th>

                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($companies as $company)
                            <tr>

                                <td>
                                    {{ $company->id }}
                                </td>

                                <td>

                                    @if ($company->logo)
                                        <img src="{{ asset('uploads/company/' . $company->logo) }}" class="img-thumbnail"
                                            width="90">
                                    @endif

                                </td>

                                <td>

                                    <strong>
                                        {{ $company->nama_perusahaan }}
                                    </strong>

                                </td>

                                <td>

                                    {{ Str::limit($company->alamat, 40) }}

                                </td>

                                <td>

                                    {{ $company->telepon }}

                                </td>

                                <td>

                                    {{ $company->email }}

                                </td>

                                <td>

                                    <a href="/admin/company-profiles/{{ $company->id }}/edit"
                                        class="btn btn-warning btn-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="/admin/company-profiles/{{ $company->id }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus profil perusahaan?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center">

                                    Belum ada data perusahaan

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
