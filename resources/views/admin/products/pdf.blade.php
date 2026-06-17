<!DOCTYPE html>
<html>

<head>
    <title>Data Produk</title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background: #eee;
        }
    </style>

</head>

<body>

    <h2>Data Produk</h2>

    <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Tipe</th>
        </tr>

        @foreach ($products as $product)
            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $product->nama }}</td>

                <td>{{ $product->jenis_produk }}</td>

                <td>{{ $product->tipe_produk }}</td>

            </tr>
        @endforeach

    </table>

</body>

</html>
