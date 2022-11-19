@extends('layouts.layout-admin')

@section('title') Editar Beneficio @endsection

@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.benefit.update', $benefit) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $benefit->name }}">
            </div>
            @error('name')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="descriptions" cols="30" rows="10">
                {{$benefit->description}}
                </textarea>
            </div>
            @error('description')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control active" aria-label="Default select example">
                @if ($benefit->active == 1)
                    <option value="1" selected>Activo</option>
                    <option value="2">Inactiva</option>
                @else  
                    <option value="1">Activo</option>
                    <option value="2" selected>Inactiva</option>
                @endif
                </select>
            </div>
            @error('active')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Usuario</label>
                <select name="user_id" class="form-control user_id" aria-label="Default select example">
                    @if ($benefit->user_id == null)
                        <option value="">No asignado</option>
                    @else
                        <option value="{{ $benefit->user_id }}">{{ $benefit->user->firstname.' '. $benefit->user->lastname}}</option>
                    @endif
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