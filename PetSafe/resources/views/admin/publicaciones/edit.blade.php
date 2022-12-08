@extends('layouts.layout-admin')
@section('title') Editar Publicación @endsection
@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css?v=').time() }}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Publicación</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.publication.update', ['publication'=>$publication, 'animal'=>$animal]) }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="title" type="text" name="title" placeholder="Título" autocomplete="off" value="{{ $publication->title }}">
                        <label for="title">Título</label>
                        <small class="error-text mt-2"><i class="fa-solid fa-circle-exclamation"></i>Ingrese un título correcto (mínimo 5 carácteres)</small>
                        @error('title')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
    
                <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="petname" type="text" name="name" placeholder="Nombre" autocomplete="off" value="{{ $animal->name }}">
                        <label for="petname">Nombre</label>
                        <small class="error-text mt-2"><i class="fa-solid fa-circle-exclamation"></i>Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="form3Example1q">Especie</label>
                    <select class="form-select specie input-select-component shadow-none" name="specie" id="specie">
                        <option value="" disabled selected>Seleccione una especie</option>
                        @foreach ($species as $specie)
                            <option value="{{ $specie->id }}">{{ $specie->specie }}</option>
                        @endforeach
                    </select>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Seleccione una opción válida</small>
                    @error('specie')
                    <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
    
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="breed_id">Raza</label>
                    <select class="form-select breed" name="breed_id" id="breed_id">
                        <option value="" disabled selected>Seleccione una especie primero</option> 
                    </select>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Seleccione una opción válida</small>
                    @error('breed_id')
                    <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
    
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="form3Example1q">Sexo</label>
                    <select class="form-select gender input-select-component shadow-none" name="gender" id="gender">
                        @if ($animal->gender == 'Macho')
                            <option value="Macho" selected>Macho</option>
                            <option value="Hembra">Hembra</option>
                        @else
                            <option value="Macho">Macho</option>
                            <option value="Hembra" selected>Hembra</option>
                        @endif
                    </select>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Seleccione una opción válida</small>
                    @error('gender')
                    <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
    
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="category_id">Categoría</label>
                    <select class="form-select category input-select-component shadow-none" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            @if ($category->id == $publication->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Seleccione una opción válida</small>
                    @error('category_id')
                    <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-date">
                    <label class="form-label" for="form3Example1q">Fecha del incidente</label>
                    <input type="date" id="incidentDate" 
                    class="form-control shadow-none input-date-component" name="incidentDate" value="{{ $publication->incidentDate }}" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false"></input>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Seleccione una fecha correcta</small>
                    @error('incidentDate')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-textarea">
                    <label class="form-label" for="form3Example1q">Descripción</label>
                    <textarea type="textarea" id="description" 
                    class="form-control input-text-area-component shadow-none" placeholder="Ingrese aquí los detalles de su publicación" 
                    name="description" rows="5">{{ $publication->description }}</textarea>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Ingrese una descripción correcta (mínimo 10 carácteres)</small>
                    @error('description')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="active">Estado</label>
                    <select class="form-select input-select-component shadow-none" name="active" id="active">
                        @if ($publication->active == 1)
                            <option value="1" selected>Activo</option>
                            <option value="2">Inactiva</option>
                        @else
                            <option value="1">Activo</option>
                            <option value="2" selected>Inactiva</option>
                        @endif
                    </select>
                    @error('active')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
    
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-file mt-4">
                    <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                    <input type="file" id="photo" class="form-control input-file-component shadow-none" 
                    placeholder="" name="photo"/>
                    <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i>Ingrese un archivo válido</small>
                    @if(Session::has('file_error'))
                        <strong class="mt-2 mb-4" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('file_error') }}</strong>
                    @endif
                    @error('photo')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</strong>
                    @enderror
                </div>
    
            </div>
            <div class="btn-component">
                <button class="btn-default" type="submit">Actualizar Publicación</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('JS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/select-publication.js?v=').time() }}"></script>
    <script src="{{ asset('js/validate-publication.js?v=').time() }}"></script>
@endsection

