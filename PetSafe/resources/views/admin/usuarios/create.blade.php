@extends('layouts.layout-admin')
@section('title') Crear Usuario @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Usuario</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="run" type="text" name="run" placeholder="Rut" autocomplete="off">
                        <label for="run">Rut</label>
                        @error('run')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="firstname" type="text" name="firstname" placeholder="Nombre" autocomplete="off">
                        <label for="firstname">Nombre</label>
                        @error('firstname')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="lastname" type="text" name="lastname" placeholder="Apellido" autocomplete="off">
                        <label for="firstname">Apellido</label>
                        @error('lastname')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="email" type="email" name="email" placeholder="Email" autocomplete="off">
                        <label for="run">Email</label>
                        @error('email')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="password" type="password" name="password" placeholder="Contraseña" autocomplete="off">
                        <label for="run">Contraseña</label>
                        @error('password')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="form-group mt-3">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" id="" class="form-control input-file-component shadow-none">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="form3Example1q">Rol</label>
                    <select class="form-select input-select-component shadow-none" name="role_id" id="role_id">
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->role }} </option>
                        @empty
                            <option selected disabled>No hay roles disponibles.</option>
                        @endforelse
                    </select>
                    @error('role_id')
                        <strong style="color: darkred">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="form3Example1q">Estado</label>
                    <select class="form-select input-select-component shadow-none" name="active" id="active">
                        <option selected disabled>Seleccione...</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactiva</option>
                    </select>
                    @error('active')
                        <strong style="color: darkred">{{ $message }}</strong>
                    @enderror
                </div>
                
            </div>
            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear Procedimiento</button>
            </div>
        </form>
    </div>
</div>
@endsection

