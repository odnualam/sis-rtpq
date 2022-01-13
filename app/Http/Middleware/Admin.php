<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Operator' && $request->user()->role != 'Admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
