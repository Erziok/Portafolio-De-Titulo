@extends('layouts.layout-admin')
@section('title') Crear Publicación @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.publication.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Título</label>
                <input type="text" name="title" id="" class="form-control">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="active" class="form-control active" aria-label="Default select example">
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
                @error('active')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Fecha del Incidente</label>
                <input type="date" name="incidentDate" id="" class="form-control">
                @error('incidentDate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Foto Portada</label>
                <input type="file" name="photo" id="" class="form-control">
                @error('photo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="category_id" id="" class="form-control category_id" aria-label="Default select example">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->category }} </option>
                    @empty
                        <option selected disabled>No hay categorias disponibles.</option>
                    @endforelse
                </select>
                @error('categoy_id')
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

@section('JS')
    <script>
        $(document).ready(function() {
        $('.active, .category_id').select2();
        });
    </script>
@endsection