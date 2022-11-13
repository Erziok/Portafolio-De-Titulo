@extends('layouts.layout-admin')

@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.publication.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Titulo</label>
                <input type="text" name="title" id="" class="form-control">
                
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="active" class="form-control" aria-label="Default select example">
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">Fecha del Incidente</label>
                <input type="date" name="incidentDate" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Foto Portada</label>
                <input type="file" name="photo" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Rol</label>
                <select name="category_id" id="" class="form-control" aria-label="Default select example">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->category }} </option>
                    @empty
                        <option selected disabled>No hay categorias disponibles.</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection