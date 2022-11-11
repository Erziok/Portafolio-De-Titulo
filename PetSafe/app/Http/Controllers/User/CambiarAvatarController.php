<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\CambiarAvatarRequest;

class CambiarAvatarController extends Controller
{
    public function changeAvatar(CambiarAvatarRequest $request)
    {
        $fileRoute = 'images/avatars/';
        $userImage = $request -> file('avatar');

        $imageName = time().'-'.$userImage->getClientOriginalName();
        $imageUpload = $fileRoute;

        $userImage->move($imageUpload, $imageName);

        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'avatar' => $imageUpload.$imageName,
            ]);
        
        return redirect()->route('perfil');
    }
}
