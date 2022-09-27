<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdopcionController extends Controller
{
    public function index()
    {
        return view('user.adopcion');
    }
}
