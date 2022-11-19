@extends('layouts.layout-admin')
@section('title') Editar Publicación @endsection
@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.publication.update', $publication) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="">Titulo</label>
                <input type="text" name="title" id="" class="form-control" value="{{ $publication->title }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $publication->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control" aria-label="Default select example">
                    @if ($publication->active == 1)
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactiva</option>
                    @else
                        <option value="1">Activo</option>
                        <option value="2" selected>Inactiva</option>
                    @endif
                </select>
                @error('active')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Fecha del Incidente</label>
                <input type="date" name="incidentDate" id="" class="form-control" value="{{ $publication->incidentDate }}">
                @error('incidentDate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Foto Portada</label>
                <input type="file" name="photo" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Categoria</label>
                <select name="category_id" id="" class="form-control" aria-label="Default select example">
                    @forelse ($categories as $category)
                        @if ($publication->category_id == $category->id)
                            <option value="{{ $category->id }}" selected> {{ $category->category }} </option>
                        @else
                            <option value="{{ $category->id }}"> {{ $category->category }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay categorias disponibles.</option>
                    @endforelse
                </select>
                @error('category_id')
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