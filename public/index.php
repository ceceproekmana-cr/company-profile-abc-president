<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Daftarkan Autoloader Composer langsung ke folder root atas
require __DIR__ . '/../vendor/autoload.php';

// Jalankan Aplikasi Laravel langsung ke folder root atas
$app = require_once __DIR__ . '/../bootstrap/app.php';

$handle = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $handle->handle(
    $request = Request::capture()
)->send();

$handle->terminate($request, $response);