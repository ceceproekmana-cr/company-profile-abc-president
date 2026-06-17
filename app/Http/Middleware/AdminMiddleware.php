<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
public function handle($request, Closure $next)
{
    if (!session()->has('user_id')) {

        return redirect('/login')
            ->with(
                'error',
                'Halaman Admin hanya dapat diakses oleh Administrator. Silakan login terlebih dahulu.'
            );
    }

    return $next($request);
}
}