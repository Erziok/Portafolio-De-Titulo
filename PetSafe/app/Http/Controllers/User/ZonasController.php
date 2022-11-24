<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ZonasController extends Controller
{
    public function index()
    {
        return view('user.zonas');
    }
}
