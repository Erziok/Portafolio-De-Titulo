<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        User::create([
            'name'=> $request->name,
            'lastname'=> $request->lastname,
            'email'=> $request->email,
            'rut'=> $request->rut,
            'password'=> $request->password,
        ]);
        return redirect()->route('login');
    }
}
