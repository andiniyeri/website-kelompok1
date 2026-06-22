<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('role') !== 'user') {
            return redirect()->route('login')
                ->with('error', 'Akses hanya untuk user');
        }

        return $next($request);
    }
}
