<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        return view('user.publicaciones');
    }
}
