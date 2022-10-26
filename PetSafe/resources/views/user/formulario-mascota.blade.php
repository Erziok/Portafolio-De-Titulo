@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
@endsection

    @section('content')

    <section>
        <div class="publication-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Crea tu publicación</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('formulario-mascota.create') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Título</label>
                        <input type="text" id="title" class="form-control" 
                        placeholder="Título de la publicación" name="title"/>
                        <small class="error-text">Ingrese un título correcto (mínimo 5 carácteres)</small>
                        @error('title')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="petname" class="form-control" placeholder="Nombre" name="name"/>
                        <small class="error-text">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Especie</label>
                        <select class="form-select" name="specie" id="specie">
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

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Raza</label>
                        <select class="form-select" name="breed" id="breed">
                            <option value="" disabled selected>Seleccione una especie primero</option> 
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('breed')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Sexo</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="" disabled selected>Seleccione un genero</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('gender')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Categoría</label>
                        <select class="form-select" name="category" id="category">
                            <option value="" disabled selected>Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('category')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 form-box form-box-textarea">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"></textarea>
                        <small class="error-text">Ingrese una descripción correcta (mínimo 10 carácteres)</small>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 form-box form-box-date">
                        <label class="form-label" for="form3Example1q">Fecha del incidente</label>
                        <input type="date" id="incidentDate" 
                        class="form-control" name="incidentDate" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false"></input>
                        <small class="error-text">Seleccione una fecha correcta</small>
                        @error('incidentDate')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-file">
                        <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                        <input type="file" id="photo" class="form-control" 
                        placeholder="" name="photo"/>
                        <small class="error-text">Ingrese un archivo válido</small>
                        @error('photo')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="publication-btn" id="submit-btn">Publicar</button>
            </form>
            
            
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/validate-publication.js?v=').time() }}"></script>
<script src="{{ asset('js/select-publication.js?v=').time() }}"></script>
@endsection