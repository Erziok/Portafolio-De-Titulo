<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
       $data = [
        
        ];
        return view('user.home', compact('data'));
    }
}
