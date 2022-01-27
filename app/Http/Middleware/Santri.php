<?php

namespace App\Http\Middleware;

use Closure;

class Santri
{
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Santri') {
            return redirect('home');
        }

        return $next($request);
    }
}
