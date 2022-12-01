<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Course::with(['benefit'])->where('active','<',2)->latest()->get()->paginate(10);
        return view('user.curso', compact('cursos'));
    }
}
