@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/cambiar-contraseña.css?v=').time() }}">
@endsection

    @section('content')

    <section>
        <div class="change-password-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Cambiar Contraseña</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('cambiar-contraseña.update') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Contraseña actual</label>
                        @error('mensaje')
                        <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                        <input type="password" id="actual_password" class="form-control" 
                        name="actual_password" value=""/>
                        <small class="error-text">No puede dejar este campo en blanco</small>
                        
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Nueva contraseña</label>
                        <input type="password" id="password" class="form-control" name="password" 
                        value=""/>
                        <small class="error-text">Ingrese una contraseña válida (mínimo 6 carácteres)</small>
                        @error('lastname')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Repita la contraseña</label>
                        <input type="password" id="confirm_password" class="form-control" name="confirm_password" 
                        value=""/>
                        <small class="error-text">Las contraseñas no coinciden</small>
                        @error('confirm_password')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                </div>
                <button type="submit" class="change-password-btn" id="submit-btn">Cambiar contraseña</button>
            </form>
            
            
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/change-password.js') }}"></script>
@endsection