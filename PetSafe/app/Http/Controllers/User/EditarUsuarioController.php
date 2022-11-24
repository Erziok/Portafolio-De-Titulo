<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\EditarUsuarioRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EditarUsuarioController extends Controller
{
    public function index () 
    {
        return view('user.editar-usuario');
    }

    public function updateUser(EditarUsuarioRequest $request)
    {
        
        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'firstname' => $request -> firstname,
                'lastname' => $request -> lastname,
            ]);
        Alert::toast('Perfil actualizado correctamente', 'success');
        return redirect()->route('perfil'); 
    }
}
