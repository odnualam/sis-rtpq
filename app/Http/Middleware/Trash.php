<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Trash
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != 'Admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
