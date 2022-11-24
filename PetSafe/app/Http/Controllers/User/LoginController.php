<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
                Alert::toast('Has iniciado sesión correctamente', 'success');
                return redirect()->route('home');
            }
            Alert::toast('Has iniciado sesión correctamente', 'success');
            return redirect()->route('admin.home');
        }

        Alert::toast('Oops... No se ha podido iniciar sesión, intentelo de nuevo', 'error');
        return back()->withInput($request->input());
    }
}
