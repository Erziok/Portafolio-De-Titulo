@extends('layouts.layout-admin')

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
            <div class="form-group mt-3">
                <label for="">Avatar</label>
                <input type="file" name="avatar" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="role_id" id="" class="form-control" aria-label="Default select example">
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
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection