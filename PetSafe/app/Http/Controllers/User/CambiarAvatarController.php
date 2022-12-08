<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\CambiarAvatarRequest;

class CambiarAvatarController extends Controller
{
    public function changeAvatar(CambiarAvatarRequest $request)
    {

        $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
        if(!in_array($request->file('avatar')->getClientOriginalExtension(), $allowedExtensions)) {
            return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
        }

        $fileRoute = 'images/avatars/';
        $userImage = $request -> file('avatar');

        $imageName = time().'-'.$userImage->getClientOriginalName();

        //Eliminacion e inserción
        if (!empty(auth()->user()->avatar)) {
            File::delete(auth()->user()->avatar);
        }

        $imageUpload = $fileRoute;
        $userImage->move($imageUpload, $imageName);

        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'avatar' => $imageUpload.$imageName,
            ]);
        Alert::toast('Avatar actualizado correctamente', 'success');
        return redirect()->route('perfil');
    }
}
