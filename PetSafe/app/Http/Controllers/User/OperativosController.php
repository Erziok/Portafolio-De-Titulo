<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClinicalProcedure;

class OperativosController extends Controller
{
    public function index()
    {
        $operativos = ClinicalProcedure::with(['benefit'])->get()->paginate(10);
        return view('user.operativos', compact('operativos'));
    }
}
