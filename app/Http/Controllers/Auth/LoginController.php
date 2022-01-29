<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'Admin') {
            return '/admin/home';
        }

        return '/home';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
