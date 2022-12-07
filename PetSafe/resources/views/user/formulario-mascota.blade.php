@extends('layouts.layout-user')

@section('title') Formulario Mascota @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="publication-section">
    <div class="section-title mb-4 mt-2">
        <h2>Crea tu publicación</h2>
        <div class="hline"></div>
    </div>
    <form action="{{ route('formulario-mascota.create') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                <div class="input-component">
                    <input class="c-text-black" id="title" type="text" name="title" placeholder="Título" autocomplete="off">
                    <label for="title">Título</label>
                    <small class="error-text mt-2">Ingrese un título correcto (mínimo 5 carácteres)</small>
                    @error('title')
                        <small class="mt-2" style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                <div class="input-component">
                    <input class="c-text-black" id="petname" type="text" name="name" placeholder="Nombre" autocomplete="off">
                    <label for="petname">Nombre</label>
                    <small class="error-text mt-2">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                    @error('name')
                        <small class="mt-2" style="color: darkred">{{ $message }}</small>
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
                <small class="error-text">Seleccione una opción válida</small>
                @error('specie')
                <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                <label class="form-label" for="breed_id">Raza</label>
                <select class="form-select breed" name="breed_id" id="breed_id">
                    <option value="" disabled selected>Seleccione una especie primero</option> 
                </select>
                <small class="error-text">Seleccione una opción válida</small>
                @error('breed_id')
                <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                <label class="form-label" for="form3Example1q">Sexo</label>
                <select class="form-select gender input-select-component shadow-none" name="gender" id="gender">
                    <option value="" disabled selected>Seleccione un genero</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
                <small class="error-text">Seleccione una opción válida</small>
                @error('gender')
                <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                <label class="form-label" for="category_id">Categoría</label>
                <select class="form-select category input-select-component shadow-none" name="category_id" id="category_id">
                    <option value="" disabled selected>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
                <small class="error-text">Seleccione una opción válida</small>
                @error('category_id')
                <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-date">
                <label class="form-label" for="form3Example1q">Fecha del incidente</label>
                <input type="date" id="incidentDate" 
                class="form-control shadow-none input-date-component" name="incidentDate" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false"></input>
                <small class="error-text">Seleccione una fecha correcta</small>
                @error('incidentDate')
                    <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-textarea">
                <label class="form-label" for="form3Example1q">Descripción</label>
                <textarea type="textarea" id="description" 
                class="form-control input-text-area-component shadow-none" placeholder="Ingrese aquí los detalles de su publicación" 
                name="description" rows="5"></textarea>
                <small class="error-text">Ingrese una descripción correcta (mínimo 10 carácteres)</small>
                @error('description')
                    <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-file">
                <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                <input type="file" id="photo" class="form-control input-file-component shadow-none" 
                placeholder="" name="photo"/>
                <small class="error-text">Ingrese un archivo válido</small>
                @error('photo')
                    <strong style="color: darkred">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="btn-component">
            <button class="btn-default" type="submit">Crear Publicación</button>
        </div>
    </form>
</div>

@endsection

@section('JS')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.breed').select2();
    });
</script>
<script src="{{ asset('js/select-publication.js?v=').time() }}"></script>
<script src="{{ asset('js/validate-publication.js?v=').time() }}"></script>
@endsection
