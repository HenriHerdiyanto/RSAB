<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Hapus $redirectTo ya
    // protected $redirectTo = '/home'; 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return '/admin'; // Kalau admin ke /admin
        }

        return '/home'; // Selain itu ke /home
    }
}
