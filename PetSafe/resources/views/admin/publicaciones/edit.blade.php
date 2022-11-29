@extends('layouts.layout-admin')
@section('title') Editar Publicación @endsection
@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.publication.update', ['publication'=>$publication, 'animal'=>$animal]) }}" method="POST" id="form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-12 form-group mt-3">
                    <label for="">Título</label>
                    <input type="text" class="form-control" name="title" value="{{ $publication->title }}">
                    @error('title')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ $animal->name }}">
                    @error('name')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Especie</label>
                    <select class="form-select specie" id="specie">
                        <option value="" disabled selected>Seleccione una especie</option>
                        @foreach ($species as $specie)
                            <option value="{{ $specie->id }}">{{ $specie->specie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Raza</label>
                    <select class="form-select breed" name="breed_id" id="breed">
                        <option value="" disabled selected>Seleccione una especie primero</option> 
                    </select>
                    @error('breed_id')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Sexo</label>
                    <select class="form-select gender" name="gender" id="gender">
                        @if ($animal->gender == 'Macho')
                            <option value="Macho" selected>Macho</option>
                            <option value="Hembra">Hembra</option>
                        @else
                            <option value="Macho">Macho</option>
                            <option value="Hembra" selected>Hembra</option>
                        @endif
                    </select>
                    @error('gender')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Categoría</label>
                    <select class="form-select category" name="category_id" id="category">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            @if ($category->id == $publication->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                            @endif
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12 form-group mt-3">
                    <label for="">Fecha del incidente </label>
                    <input type="date" id="incidentDate" class="form-control" name="incidentDate" value="{{ $publication->incidentDate }}" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false"></input>
                    @error('incidentDate')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12 form-group mt-3">
                    <label for="">Descripción</label>
                    <textarea type="textarea" id="description" class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" name="description" rows="5">{{ $publication->description }}</textarea>
                    @error('description')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12 form-group mt-3">
                    <label for="">Estado</label>
                    <select name="active" class="form-control active" aria-label="Default select example">
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
                <div class="col-lg-12 form-group mt-3">
                    <label for="">Foto</label>
                    <input type="file" id="photo" class="form-control" placeholder="" name="photo"/>
                    @error('photo')
                      <small style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="form-control btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('JS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/select-publication.js?v=').time() }}"></script>
@endsection

