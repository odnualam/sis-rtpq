<?php

namespace App\Http\Middleware;

use Closure;

class Siswa
{
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Siswa') {
            return redirect('home');
        }

        return $next($request);
    }
}
