<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Tentukan path ke folder utama (root) Laravel
$rootDir = __DIR__ . '/..';

// Daftarkan Autoloader Composer
if (file_exists($rootDir . '/vendor/autoload.php')) {
    require $rootDir . '/vendor/autoload.php';
}

// Jalankan Aplikasi Laravel
$app = require_once $rootDir . '/bootstrap/app.php';

$handle = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $handle->handle(
    $request = Request::capture()
)->send();

$handle->terminate($request, $response);