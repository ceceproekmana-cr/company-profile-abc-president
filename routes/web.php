<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/news', [PageController::class, 'news']);

Route::get(
    '/news/{slug}',
    [PageController::class, 'newsDetail']
);

Route::get('/gallery', [PageController::class, 'gallery']);

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/login', [AdminAuthController::class, 'login']);
Route::post('/login', [AdminAuthController::class, 'authenticate']);
Route::get('/logout', [AdminAuthController::class, 'logout']);

Route::middleware('admin')->group(function () {

    Route::get(
        '/admin/dashboard',
        [DashboardController::class, 'index']
    );

    Route::get(
        '/admin/messages',
        [ContactMessageController::class, 'index']
    );

    Route::get(
        '/admin/products/pdf',
        [ProductController::class, 'pdf']
    );

    Route::resource(
        'admin/products',
        ProductController::class
    );

    Route::resource(
        'admin/galleries',
        GalleryController::class
    );

    Route::resource(
        'admin/company-profiles',
        CompanyProfileController::class
    );

    Route::resource(
        'admin/news',
        NewsController::class
    );

}); // <-- middleware admin selesai

Route::post(
    '/contact/send',
    [ContactController::class, 'store']
);

Route::get('/admin', function () {
    return redirect('/login');
});