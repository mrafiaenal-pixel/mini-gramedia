<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user()->role !== 'admin') {
            return redirect('/')->with(
                'error',
                'Anda tidak memiliki izin akses'
            );
        }
        return $next($request);
    }
}
