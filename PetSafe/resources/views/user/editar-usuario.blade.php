@extends('layouts.layout-user')

@section('title') Editar Usuario @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/editar-usuario.css?v=').time() }}">
@endsection

@section('content')
<div class="edit-section">
    <div class="section-title mb-4 mt-2">
        <h2 class="c-text-black">Editar datos de usuario</h2>
        <div class="hline"></div>
    </div>
    <form action="{{ route('editar-usuario.update') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                <div class="input-component">
                    <input class="c-text-black" id="firstname" type="text" name="firstname" placeholder="Nombre" autocomplete="off" value="{{ Auth::user()->firstname }}">
                    <label for="firstname">Nombre</label>
                    <small class="error-text mt-2"><i class="fa-solid fa-circle-exclamation"></i> Introduce un nombre válido (mínimo 3 carácteres / solo letras)</small>
                    @error('email')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box">
                <div class="input-component">
                    <input class="c-text-black" id="lastname" type="text" name="lastname" placeholder="Apellido" autocomplete="off" value="{{ Auth::user()->lastname }}">
                    <label for="lastname">Apellido</label>
                    <small class="error-text mt-2"><i class="fa-solid fa-circle-exclamation"></i> Introduce un apellido válido (mínimo 3 carácteres / solo letras)</small>
                    @error('email')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="btn-component">
                <a href="{{ route('perfil') }}" class="btn-simple-component"> <i class="fa-solid fa-arrow-left-long"></i> Volver</a>
            </div>
            <div class="btn-component">
                <button class="btn-default" type="submit">Guardar Cambios</button>
            </div>
        </div>
         
    </form>
    
    
</div>
@endsection

@section('JS')
<script src="{{ asset('js/edit-user.js') }}"></script>
@endsection