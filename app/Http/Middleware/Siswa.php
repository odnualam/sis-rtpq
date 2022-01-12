<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Siswa
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Siswa') {
            return redirect('home');
        }

        return $next($request);
    }
}
