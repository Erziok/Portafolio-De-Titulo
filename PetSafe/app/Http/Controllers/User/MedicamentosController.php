<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Medicine;

class MedicamentosController extends Controller
{
    public function index()
    {
        $medicamentos = Medicine::with(['benefit'])->get();
        return view('user.medicamentos', compact('medicamentos'));
    }
}