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

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Título</label>
                        <input type="text" id="title" class="form-control" 
                        placeholder="Título de la publicación" name="title"/>
                        @error('title')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="petname" class="form-control" placeholder="Nombre" name="name"/>
                        @error('name')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Especie</label>
                        <select class="form-select" name="specie" id="specie">
                            <option value="" disabled selected>Seleccione una especie</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                        </select>
                        @error('specie')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Raza</label>
                        <input type="text" id="breed" class="form-control" placeholder="Raza" name="breed"/>
                        @error('breed')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Sexo</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="" disabled selected>Seleccione un genero</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                        @error('gender')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Categoría</label>
                        <select class="form-select" name="category" id="category">
                            <option value="" disabled selected>Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"></textarea>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Fecha del incidente</label>
                        <input type="date" id="incidentDate" 
                        class="form-control" name="incidentDate" max="<?php echo date("Y-m-d"); ?>"></input>
                        @error('incidentDate')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                        <input type="file" id="image" class="form-control" 
                        placeholder="" name="image"/>
                        @error('image')
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

@endsection