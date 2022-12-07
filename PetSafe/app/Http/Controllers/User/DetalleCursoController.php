<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Course;
use Illuminate\Http\Request;

class DetalleCursoController extends Controller
{
    public function index($id)
    {
        $objects = Course::with(['session'])->where('id', $id)->get();
        return view('user.detalle-curso', compact('objects'));
    }
}
