<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
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
                toastr()->success('Se ha iniciado sesión correctamente', '¡Perfecto!');
                return redirect()->route('home');
            }
            toastr()->success('Se ha iniciado sesión correctamente', '¡Perfecto!');
            return redirect()->route('admin.home');
        }

        toastr()->error('Los datos ingresados no coinciden con nuestros registros', 'Oops...');
        return back()->withInput($request->input());
    }
}
