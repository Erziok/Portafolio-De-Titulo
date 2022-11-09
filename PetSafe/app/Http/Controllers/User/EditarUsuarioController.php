<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\EditarUsuarioRequest;

class EditarUsuarioController extends Controller
{
    public function index () 
    {
        return view('user.editar-usuario');
    }

    public function updateUser(EditarUsuarioRequest $request)
    {
        // $fileRoute = 'images/avatars/';
        // $userImage = $request -> file('avatar');

        // $imageName = time().'-'.$userImage->getClientOriginalName();
        // $imageUpload = $fileRoute;

        // $userImage->move($imageUpload, $imageName);

        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'firstname' => $request -> firstname,
                'lastname' => $request -> lastname,
                // 'avatar' => $imageUpload.$imageName,
            ]);

        return redirect()->route('home'); //Cambiar cuando se haya creado la vista perfil
    }
}
