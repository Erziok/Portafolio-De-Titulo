<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Benefit;

class ZonasController extends Controller
{
    public function index()
    {
        $beneficio = Benefit::with('canineArea')->where('benefit_type_id', 3)->where('active','<',2)->first();
        return view('user.zonas', compact('beneficio'));
    }
}
