<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, \Closure $next, $role): Response
    {
        if (!auth()->check() || auth()->user()->role !== $role) {
            // Jika bukan admin tapi coba akses dashboard, lempar ke home
            return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
