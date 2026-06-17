<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    // Menampilkan semua data produk

public function index(Request $request)
{
    $query = Product::query();

    if ($request->keyword) {

        $query->where('nama', 'like', '%'.$request->keyword.'%')
              ->orWhere('jenis_produk', 'like', '%'.$request->keyword.'%')
              ->orWhere('tipe_produk', 'like', '%'.$request->keyword.'%');
    }

    $products = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view(
        'admin.products.index',
        compact('products')
    );
}

    // Form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Simpan produk
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jenis_produk' => 'required',
        'tipe_produk' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|file'
    ]);

    $gambar = null;

    if ($request->hasFile('gambar')) {

        $file = $request->file('gambar');

        $gambar = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/products'),
            $gambar
        );
    }

Product::create([
    'nama' => $request->nama,
    'jenis_produk' => $request->jenis_produk,
    'tipe_produk' => $request->tipe_produk,
    'deskripsi' => $request->deskripsi,
    'gambar' => $gambar,
    'is_featured' => $request->has('is_featured')
]);

    return redirect('/admin/products')
        ->with('success', 'Produk berhasil ditambahkan');
}

// Form edit produk
public function edit($id)
{
    $product = Product::findOrFail($id);

    return view(
        'admin.products.edit',
        compact('product')
    );
}

    // Update
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $gambar = $product->gambar;

    if ($request->hasFile('gambar')) {

        $file = $request->file('gambar');

        $gambar = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/products'),
            $gambar
        );
    }

    $product->update([
    'nama' => $request->nama,
    'jenis_produk' => $request->jenis_produk,
    'tipe_produk' => $request->tipe_produk,
    'deskripsi' => $request->deskripsi,
    'gambar' => $gambar,
    'is_featured' => $request->has('is_featured')
]);

    return redirect('/admin/products')
        ->with('success', 'Produk berhasil diperbarui');
}

    // Hapus
    public function destroy($id)
{
    Product::destroy($id);

    return redirect('/admin/products')
            ->with('success', 'Produk berhasil dihapus');
}
public function pdf()
{
    $products = Product::all();

    $pdf = Pdf::loadView(
        'admin.products.pdf',
        compact('products')
    );

    return $pdf->download('data-produk.pdf');
}
}