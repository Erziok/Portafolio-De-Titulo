<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Benefit;

class ZonasController extends Controller
{
    public function index()
    {
        $beneficio = Benefit::where('benefit_type_id', 3)->where('active','<',2)->first();
        $zonas = $beneficio->canineArea()->paginate(10);
        return view('user.zonas', compact('beneficio', 'zonas'));
    }
}
