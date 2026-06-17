<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\ContactMessage;


class DashboardController extends Controller
{
   public function index()
{
    $news = News::count();

    $product = Product::count();

    $gallery = Gallery::count();

    $messages = ContactMessage::count();

    return view(
        'admin.dashboard',
        compact(
            'news',
            'product',
            'gallery',
            'messages'
        )
    );
}
}