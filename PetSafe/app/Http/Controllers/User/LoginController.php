<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function loginUser(LoginRequest $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], false)) {
            if (auth()->user()->role_id != 1) {
                return redirect()->route('home');
            }
            return redirect()->route('admin.home');
        }
        return back()->withErrors(['mensaje'=>'Inicio de sesión incorrecto']);
    }
}
