<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role != 'Admin' && $request->user()->role != 'Kepala Sekolah') {
            return redirect('/');
        }

        return $next($request);
    }
}
