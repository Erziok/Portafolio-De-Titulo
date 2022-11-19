@extends('layouts.layout-user')

@section('title') Editar Usuario @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/editar-usuario.css?v=').time() }}">
@endsection

    @section('content')

    <section>
        <div class="edit-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Editar datos de usuario</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('editar-usuario.update') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="firstname" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}"/>
                        <small class="error-text">Introduce un nombre válido (mínimo 3 carácteres / solo letras)</small>
                        @error('firstname')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                        <label class="form-label" for="form3Example1q">Apellido</label>
                        <input type="text" id="lastname" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}"/>
                        <small class="error-text">Introduce un apellido válido (mínimo 3 carácteres / solo letras)</small>
                        @error('lastname')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    {{-- <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-file">
                        <label class="form-label" for="form3Example1q">Avatar</label><br>
                        <input type="file" id="avatar" class="form-control" 
                        placeholder="" name="avatar"/>
                        <small class="error-text">Ingrese un archivo válido</small>
                        @error('avatar')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div> --}} 
                    
                </div>
                <button type="submit" class="edit-btn" id="submit-btn">Guardar cambios</button>
            </form>
            
            
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/edit-user.js') }}"></script>
@endsection