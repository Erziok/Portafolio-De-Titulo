<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EncontradasController extends Controller
{
    public function index()
    {
        return view('user.encontradas');
    }
}
