<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ActualizarUsuarioRequest;
use App\Http\Requests\Admin\User\GuardarUsuarioRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioRequest $request)
    {

        if ($request->hasFile('avatar')) {
            $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
            if(!in_array($request->file('avatar')->getClientOriginalExtension(), $allowedExtensions)) {
                return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
            }
            $fileRoute = 'images/avatars/';
            $userImage = $request -> file('avatar');
    
            $imageName = time().'-'.$userImage->getClientOriginalName();
            $imageUpload = $fileRoute;
    
            $userImage->move($imageUpload, $imageName);

            if(User::create($request->only(['firstname', 'lastname', 'email', 'run', 'active', 'role_id']) + ["avatar"=>$imageUpload.$imageName])) {
                Alert::toast('Usuario creado correctamente', 'success');
            }else {
                Alert::toast('Oops... No se ha podido guardar el usuario', 'error'); 
            }
        }

        if(User::create($request->validated())) {
            Alert::toast('Usuario creado correctamente', 'success');
        }else {
            Alert::toast('Oops... No se ha podido guardar el usuario', 'error'); 
        }        
       
        
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarUsuarioRequest $request, User $user)
    {
        if ($request->hasFile('avatar')) {
            $allowedExtensions = ['PNG', 'png', 'jpg','JPG', 'jpeg', 'JPEG'];
            if(!in_array($request->file('avatar')->getClientOriginalExtension(), $allowedExtensions)) {
                return redirect()->back()->with('file_error', 'Tipo de archivo no permitido.');
            }
            $fileRoute = 'images/avatars/';
            $userImage = $request -> file('avatar');
    
            $imageName = time().'-'.$userImage->getClientOriginalName();
            $imageUpload = $fileRoute;
            
            //Eliminacion e inserción
            if (!empty($user->avatar)) {
                File::delete($user->avatar);
            }
            $userImage->move($imageUpload, $imageName);

            if($user->update($request->only(['firstname', 'lastname', 'email', 'run', 'active', 'role_id']) + ["avatar"=>$imageUpload.$imageName])) {
                Alert::toast('Usuario creado correctamente', 'success');
            }else {
                Alert::toast('Oops... No se ha podido guardar el usuario', 'error'); 
            }
        }

        if ($user->update($request->validated())) {
            Alert::toast('Usuario actualizado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido actualizar el usuario', 'error'); 
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            Alert::toast('Usuario eliminado correctamente', 'success');         
        } else {
            Alert::toast('Oops... No se ha podido eliminar el usuario', 'error');     
        }
        return redirect()->route('admin.user.index');
    }
}
