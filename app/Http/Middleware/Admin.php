<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Operator' && $request->user()->role != 'Admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
