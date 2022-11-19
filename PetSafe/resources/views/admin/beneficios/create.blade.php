@extends('layouts.layout-admin')
@section('title') Crear Beneficio @endsection
@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.benefit.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="descriptions" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control" aria-label="Default select example">
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">Usuario</label>
                <select name="user_id" class="form-control" aria-label="Default select example">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->firstname.' '. $user->lastname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection