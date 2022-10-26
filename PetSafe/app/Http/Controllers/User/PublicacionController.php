<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\SearchRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PublicacionController extends Controller
{
    public function index()
    {
        $datos = DB::table('publications')->paginate(1);
        return view('user.publicaciones', compact('datos'));
    }
    public function search(SearchRequest $request) {
        $valor = preg_replace("/[^A-Za-z0-9 ]/", '', $request->field);
        if (isset($_GET['field'])) {
            $datos = DB::table('publications')
            ->where('description', 'like', '%' . e($valor) . '%')
            ->orWhere('title', 'like', '%' . e($valor) . '%')->paginate(1);
            $datos->appends($request->all());
            return view('user.publicaciones', compact('datos', 'valor'));
        } else {
            return redirect()->route('publicaciones'); 
        }
    }
    public function filter(FilterRequest $request) {
        if (isset($_GET['filter'])) {
            $datos = DB::table('publications')
            ->where('categories_id', e($request->filter))
            ->paginate(1);
            $datos->appends($request->all());
            return view('user.publicaciones', compact('datos'));
        }else {
            return redirect()->route('publicaciones'); 
        }
    }
}
