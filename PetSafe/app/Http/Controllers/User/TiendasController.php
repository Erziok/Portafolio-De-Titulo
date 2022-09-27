<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;

class TiendasController extends Controller
{
    public function index()
    {
        return view('user.tiendas');
    }
}
