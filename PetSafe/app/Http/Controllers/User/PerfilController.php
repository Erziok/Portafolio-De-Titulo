<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SearchRequest;
use App\Models\Publication;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
    {
        //$datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->where('user_id', auth() -> id())->get()->paginate(1); 
        $datos = User::with(['publication', 'favourite', 'role'])->withCount(['publication', 'favourite'])->where('id', auth() -> id())->get()->paginate(1);
        return view('user.perfil', compact('datos'));
    }

    public function search(SearchRequest $request) {
        $valor = preg_replace("/[^A-Za-z0-9 ]/", '', $request->field);
        if (isset($_GET['field'])) {
            $datos = Publication::where('description', 'like','%'.e($valor).'%')
            ->orWhere('title', 'like', '%' . e($valor) . '%')
            ->with('user')->withCount('comment')
            ->get()
            ->paginate(10); 

            $datos->appends($request->all());
            return view('user.publicaciones', compact('datos', 'valor'));
        } else {
            return redirect()->route('publicaciones'); 
        }
    }

    public function myPublications()
    {
        $datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->where('user_id', auth() -> id())->get()->paginate(10); 
        return view('user.mis-publicaciones', compact('datos'));
    }

    public function myFavourites()
    {
        //$datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->where('user_id', auth() -> id() && !empty('favourite'))->get()->paginate(10);
        $datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->whereRelation('favourite', 'user_id', auth() -> id())->get()->paginate(10);
        return view('user.mis-favoritos', compact('datos'));
    }
}
