<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\CompanyProfile;
use App\Models\News;
use App\Models\ContactMessage;

class PageController extends Controller
{
   public function home()
{
    $company = CompanyProfile::first();

 $products = Product::where(
        'is_featured',
        1
    )
    ->latest()
    ->take(6)
    ->get();

    $news = News::latest()
        ->take(3)
        ->get();

    $galleries = Gallery::latest()
        ->take(3)
        ->get();

    return view(
        'pages.home',
        compact(
            'company',
            'products',
            'news',
            'galleries'
        )
    );
}

  public function about()
{
    $company = CompanyProfile::first();

    return view(
        'pages.about',
        compact('company')
    );
}

public function product()
{
    $products = Product::latest()
        ->paginate(6);

    return view(
        'pages.product',
        compact('products')
    );
}

    public function news()
    {
        $news = News::latest()->get(); // supaya berita baru tampil diatas
        return view('pages.news', compact('news'));
    }

public function newsDetail($slug)
{
    $news = News::where(
        'slug',
        $slug
    )->firstOrFail();

    return view(
        'pages.news_detail',
        compact('news')
    );
}

 public function contact()
{
    $company = CompanyProfile::first();

    return view(
        'pages.contact',
        compact('company')
    );
}
    
public function gallery()
{
    $galleries = Gallery::latest()->get();

    return view(
        'pages.gallery',
        compact('galleries')
    );
}
public function sendContact(Request $request)
{
    $request->validate([

        'nama' => 'required',

        'email' => 'required|email',

        'subject' => 'required',

        'message' => 'required'

    ]);

    ContactMessage::create([

        'nama' => $request->nama,

        'email' => $request->email,

        'subject' => $request->subject,

        'message' => $request->message

    ]);

    return back()->with(
        'success',
        'Pesan berhasil dikirim.'
    );
}
}