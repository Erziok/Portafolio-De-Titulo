<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Publication;

class PerfilController extends Controller
{
    public function index()
    {
        return view('user.perfil');
    }

    public function myPublications()
    {
        $datos = Publication::with(['user', 'favourite'])->withCount(['comment', 'favourite'])->where('user_id', auth() -> id())->get()->paginate(10); 
        return view('user.mis-publicaciones', compact('datos'));
    }

    public function myFavourites()
    {
        $datos = Favourite::with(['user', 'publication'])->where('user_id', auth() -> id())->get()->paginate(10); 
        return view('user.mis-favoritos', compact('datos'));
    }
}
