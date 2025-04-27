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
            return route('admin.dashboard');
        } elseif ($user->role == 'user') {
            return route('home');
        } else {
            return route('login');
        } // Selain itu ke /home
    }
}
