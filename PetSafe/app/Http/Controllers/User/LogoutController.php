<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logoutUser()
    {
        Auth::logout();
        return redirect() -> route('home');
    }
}
