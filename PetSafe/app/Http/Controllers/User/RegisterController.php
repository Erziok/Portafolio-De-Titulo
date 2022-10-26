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
            'firstname'=> $request->name,
            'lastname'=> $request->lastname,
            'email'=> $request->email,
            'run'=> $request->rut,
            'password'=> $request->password,
            'role_id'=> $request->input('roles_id', 2),
        ]);
        return redirect()->route('login');
    }
}
