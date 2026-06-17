@extends('admin.layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header bg-info text-white">

            <h4>
                📩 Pesan Masuk
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($messages as $message)
                        <tr>

                            <td>{{ $message->id }}</td>

                            <td>{{ $message->nama }}</td>

                            <td>{{ $message->email }}</td>

                            <td>{{ $message->subject }}</td>

                            <td>{{ $message->message }}</td>

                            <td>{{ $message->created_at }}</td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
