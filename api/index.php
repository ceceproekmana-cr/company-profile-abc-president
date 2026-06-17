<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
$basePath = __DIR__ . '/..';

// Check if request is for static file
$requestUri = $_SERVER['REQUEST_URI'];
$publicPath = $basePath . '/public' . $requestUri;

// If file exists in public directory, serve it directly
if (file_exists($publicPath) && is_file($publicPath)) {
    return false; // Biarkan Vercel handle static files
}

// Load Composer autoloader (bukan bootstrap/autoload.php)
require $basePath . '/vendor/autoload.php';

// Load Laravel
$app = require_once $basePath . '/bootstrap/app.php';

// Bootstrap kernel
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Handle request
$request = \Illuminate\Http\Request::capture();

try {
    $response = $app->handle($request);
    $response->send();
    $app->terminate($request, $response);
} catch (Exception $e) {
    // Log error
    error_log('Laravel Error: ' . $e->getMessage());
    error_log('File: ' . $e->getFile() . ' Line: ' . $e->getLine());
    
    // Return JSON error response
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => $e->getMessage()
    ]);
}