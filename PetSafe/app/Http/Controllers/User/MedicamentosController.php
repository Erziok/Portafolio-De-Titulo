<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Medicine;

class MedicamentosController extends Controller
{
    public function index()
    {
        $beneficio = Benefit::with('medicine')->where('benefit_type_id', 2)->where('active', '<', 2)->first();
        return view('user.medicamentos', compact('beneficio'));
    }
}