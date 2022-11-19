@extends('layouts.layout-admin')
@section('title') Crear Beneficio @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.benefit.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            @error('name')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="descriptions" cols="30" rows="10"></textarea>
            </div>
            @error('description')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control active" aria-label="Default select example">
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
            </div>
            @error('active')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Usuario</label>
                <select name="user_id" class="form-control user_id" aria-label="Default select example">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->firstname.' '. $user->lastname}}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script>
        $(document).ready(function() {
        $('.user_id, .active').select2();
        });
    </script>
@endsection