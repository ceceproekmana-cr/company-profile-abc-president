<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return view(
            'admin.galleries.index',
            compact('galleries')
        );
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'judul'         => 'required|string|max:255',
        'event'         => 'required|string|max:255',
        'tanggal_event' => 'required|date',
        'tempat'        => 'required|string|max:255',
        'gambar'        => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $gambar = null;

    if ($request->hasFile('gambar')) {

        $gambar = time() . '.' .
            $request->gambar->extension();

        $request->gambar->move(
            public_path('uploads/galleries'),
            $gambar
        );
    }

    Gallery::create([
        'judul'         => $request->judul,
        'event'         => $request->event,
        'tanggal_event' => $request->tanggal_event,
        'tempat'        => $request->tempat,
        'gambar'        => $gambar,
    ]);

    return redirect('/admin/galleries')
        ->with('success', 'Galeri berhasil ditambahkan');
}

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view(
            'admin.galleries.edit',
            compact('gallery')
        );
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $gambar = $gallery->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $gambar = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/galleries'),
                $gambar
            );
        }

        $gallery->update([
            'judul' => $request->judul,
            'event' => $request->event,
            'tanggal_event' => $request->tanggal_event,
            'tempat' => $request->tempat,
            'gambar' => $gambar,
        ]);

        return redirect('/admin/galleries')
            ->with('success','Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (
            $gallery->gambar &&
            file_exists(
                public_path(
                    'uploads/galleries/'.$gallery->gambar
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/galleries/'.$gallery->gambar
                )
            );
        }

        $gallery->delete();

        return redirect('/admin/galleries')
            ->with('success','Galeri berhasil dihapus');
    }


}