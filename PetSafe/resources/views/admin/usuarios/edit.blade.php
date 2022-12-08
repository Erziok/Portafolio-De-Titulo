@extends('layouts.layout-admin')
@section('title') Editar Usuario @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Usuario</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.user.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="run" type="text" name="run" placeholder="Rut" autocomplete="off" value="{{ $user->run }}">
                        <label for="run">Rut</label>
                        @error('run')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="firstname" type="text" name="firstname" placeholder="Nombre" autocomplete="off" value="{{ $user->firstname }}">
                        <label for="firstname">Nombre</label>
                        @error('firstname')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="lastname" type="text" name="lastname" placeholder="Apellido" autocomplete="off" value="{{ $user->lastname }}" >
                        <label for="firstname">Apellido</label>
                        @error('lastname')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="email" type="email" name="email" placeholder="Email" autocomplete="off" value="{{ $user->email }}">
                        <label for="run">Email</label>
                        @error('email')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="form-group mt-3">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" id="" class="form-control input-file-component shadow-none">
                    </div>
                    @if(Session::has('file_error'))
                        <strong class="mt-2 mb-4" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('file_error') }}</strong>
                    @endif
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="form3Example1q">Rol</label>
                    <select class="form-select input-select-component shadow-none" name="role_id" id="role_id">
                        @forelse ($roles as $role)
                            @if ($role->id == $user->role_id)
                                <option value="{{ $role->id }}" selected> {{ $role->role }} </option>
                            @else
                                <option value="{{ $role->id }}"> {{ $role->role }} </option>
                            @endif
                        @empty
                            <option selected disabled>No hay roles disponibles.</option>
                        @endforelse
                    </select>
                    @error('role_id')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="form3Example1q">Estado</label>
                    <select class="form-select input-select-component shadow-none" name="active" id="active">
                        @if ($user->active == 1)
                            <option value="1" selected>Activo</option>
                            <option value="2">Inactiva</option>
                        @else
                            <option value="1">Activo</option>
                            <option value="2" selected>Inactiva</option>
                        @endif
                    </select>
                    @error('active')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                    @enderror
                </div>

                </div>
                <div class="btn-component mt-5">
                    <button class="btn-default" type="submit">Actualizar usuario</button>
                </div>
        </form>
    </div>
</div>
@endsection

