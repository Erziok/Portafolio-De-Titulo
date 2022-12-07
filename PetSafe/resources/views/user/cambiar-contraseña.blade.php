@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/cambiar-contraseña.css?v=').time() }}">
@endsection

@section('title') Cambiar Contraseña @endsection


@section('content')


<div class="change-password-section">
    <div class="section-title mb-4 mt-2">
        <h2 class="">Cambiar Contraseña</h2>
        <div class="hline"></div>
    </div>
    <form action="{{ route('cambiar-contraseña.update') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                <div class="input-component">
                    <input class="c-text-black" id="actual_password" type="password" name="actual_password" placeholder="Contraseña actual" autocomplete="off">
                    <label for="actual_password">Contraseña actual</label>
                    <small class="error-text mt-2">No puede dejar este campo en blanco</small>
                    @error('actual_password')
                        <small class="mt-2" style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                <div class="input-component">
                    <input class="c-text-black" id="password" type="password" name="password" placeholder="Nueva contraseña" autocomplete="off">
                    <label for="password">Nueva contraseña</label>
                    <small class="error-text mt-2">Ingrese una contraseña válida (mínimo 6 carácteres)</small>
                    @error('password')
                        <small class="mt-2" style="color: darkred">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                <div class="input-component">
                    <input class="c-text-black" id="confirm_password" type="password" name="confirm_password" placeholder="Repita la contraseña" autocomplete="off">
                    <label for="confirm_password">Repita la contraseña</label>
                    <small class="error-text">Las contraseñas no coinciden</small>
                    @error('confirm_password')
                        <strong style="color: darkred">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="btn-component">
                <a href="{{ route('perfil') }}" class="btn-simple-component"> <i class="fa-solid fa-arrow-left-long"></i> Volver</a>
            </div>
            <div class="btn-component">
                <button class="btn-default" type="submit">Cambiar Contraseña</button>
            </div>
        </div>
    </form>
    
    
</div>


@endsection

@section('JS')
<script src="{{ asset('js/change-password.js') }}"></script>
@endsection