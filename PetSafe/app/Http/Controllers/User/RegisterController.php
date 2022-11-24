<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        User::create([
            'firstname'=> $request->firstname,
            'lastname'=> $request->lastname,
            'run'=> $request->run,
            'password'=> $request->password,
            'email'=> $request->email,
            'active'=> $request->input('active', 1),
            'role_id'=> $request->input('role_id', 2),
        ]);
        Alert::toast('Te has registrado correctamente', 'success');
        return redirect()->route('login');
    }
}
