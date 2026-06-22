<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('role') !== 'admin') {
            return redirect()->route('login')
                ->with('error', 'Akses hanya untuk admin');
        }

        return $next($request);
    }
}
