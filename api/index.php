<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Daftarkan Autoloader Composer secara absolut ke folder root atas
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}

// Jalankan Aplikasi bootstrap Laravel 11/12
$app = require_once __DIR__ . '/../bootstrap/app.php';

$handle = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $handle->handle(
    $request = Request::capture()
)->send();

$handle->terminate($request, $response);