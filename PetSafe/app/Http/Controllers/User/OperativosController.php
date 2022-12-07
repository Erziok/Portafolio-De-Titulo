<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\ClinicalProcedure;

class OperativosController extends Controller
{
    public function index()
    {
        $beneficio = Benefit::where('benefit_type_id', 1)->where('active','<',2)->first();
        $operativos = $beneficio->clinicalProcedure()->paginate(10);

        return view('user.operativos', compact('beneficio', 'operativos'));
    }
}
