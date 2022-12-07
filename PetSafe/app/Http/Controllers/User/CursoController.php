<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Course;

class CursoController extends Controller
{
    public function index()
    {

        $beneficio = Benefit::where('benefit_type_id', 4)->where('active','<',2)->first();
        $cursos = $beneficio->course()->where('active','<',2)->paginate(10);
        return view('user.curso', compact('beneficio', 'cursos'));
    }
}
