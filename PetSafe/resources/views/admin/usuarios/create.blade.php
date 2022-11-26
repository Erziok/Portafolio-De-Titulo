@extends('layouts.layout-admin')
@section('title') Crear Usuario @endsection
@section('content')

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Rut</label>
                <input type="text" name="run" id="" class="form-control">
                @error('run')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="firstname" id="" class="form-control">
                @error('firstname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Apellido</label>
                <input type="text" name="lastname" id="" class="form-control">
                @error('lastname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-outline mb-2 form-box">
                <label class="form-label" for="">Contraseña</label>
                <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password"/>
                @error('password')
                  <strong>{{ $message }}</strong>
                @enderror
              </div>
            <div class="form-group mt-3">
                <label for="">Avatar</label>
                <input type="file" name="avatar" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="role_id" id="" class="form-control role_id" aria-label="Default select example">
                    @forelse ($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->role }} </option>
                    @empty
                        <option selected disabled>No hay roles disponibles.</option>
                    @endforelse
                </select>
                @error('role_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control active" aria-label="Default select example">
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
                @error('active')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection

