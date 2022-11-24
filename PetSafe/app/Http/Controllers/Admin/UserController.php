<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ActualizarUsuarioRequest;
use App\Http\Requests\Admin\User\GuardarUsuarioRequest;
use App\Models\Role;
use App\Models\User;
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
