<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\CambiarContraseñaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CambiarContraseñaController extends Controller
{
    public function index()
    {
        return view('user.cambiar-contraseña');
    }

    public function changePassword(CambiarContraseñaRequest $request)
    {
        $user = Auth::user();
        $userPassword = $user -> password;

        if($request -> actual_password != ""){

            if(Hash::check($request->actual_password, $userPassword)){
                
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'password' => Hash::make($request -> password),
                    ]);
                    Alert::toast('Contraseña actualizada correctamente', 'success');
                return redirect()->route('perfil'); 
            }
            Alert::toast('Las contraseñas no coinciden', 'error');
            return back()->withErrors(['mensaje'=>'La contraseña es incorrecta']);
        }

        
        
    }
}
