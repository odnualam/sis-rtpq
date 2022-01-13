<?php

namespace App\Http\Middleware;

use Closure;

class Trash
{
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
