<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view(
            'admin.news.index',
            compact('news')
        );
    }

  public function create()
{
    $categories = Category::all();

    return view(
        'admin.news.create',
        compact('categories')
    );
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'meta_description' => 'required',
            'date' => 'required',
            'image' => 'nullable|file'
        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $image = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/news'),
                $image
            );
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'meta_description' => $request->meta_description,
            'date' => $request->date
        ]);

        return redirect('/admin/news')
            ->with(
                'success',
                'Berita berhasil ditambahkan'
            );
    }

public function edit($id)
{
    $news = News::findOrFail($id);

    $categories = Category::all();

    return view(
        'admin.news.edit',
        compact(
            'news',
            'categories'
        )
    );
}

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $image = $news->image;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $image = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/news'),
                $image
            );
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'meta_description' => $request->meta_description,
            'date' => $request->date
        ]);

        return redirect('/admin/news')
            ->with(
                'success',
                'Berita berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if (
            $news->image &&
            file_exists(
                public_path(
                    'uploads/news/'.$news->image
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/news/'.$news->image
                )
            );
        }

        $news->delete();

        return redirect('/admin/news')
            ->with(
                'success',
                'Berita berhasil dihapus'
            );
    }
}