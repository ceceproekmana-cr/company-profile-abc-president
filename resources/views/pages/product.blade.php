@extends('layouts.app')

@section('content')
    <style>
        /* RESET */
        .product-img {
            width: 150px !important;
            height: 150px !important;
            border-radius: 50% !important;
            object-fit: cover !important;
            display: block;
            margin: 0 auto;
        }

        /* CARD */
        .product-box {
            text-align: center;
            padding: 10px;
        }

        .product-box {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            height: 100%;
            transition: .3s;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .product-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        .product-img {
            width: 180px;
            height: 180px;
            object-fit: contain;
            transition: .3s;
        }

        .product-box:hover .product-img {
            transform: scale(1.08);
        }
    </style>

    <div class="container text-center">
        <h2 class="mb-4">Our Products</h2>

        <div class="row justify-content-center">

            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <div class="product-box">

                        @if ($product->gambar)
                            <img src="{{ asset('uploads/products/' . $product->gambar) }}" class="product-img">
                        @endif

                        <h6 class="mt-3">
                            {{ $product->nama }}
                        </h6>

                        <small>{{ $product->jenis_produk }}</small>
                        <br>
                        <small>{{ $product->tipe_produk }}</small>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <p>Belum ada produk.</p>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION HARUS DI LUAR LOOP --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    </div>
@endsection
