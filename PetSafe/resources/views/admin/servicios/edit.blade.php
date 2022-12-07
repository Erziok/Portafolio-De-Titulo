@extends('layouts.layout-admin')
@section('title') Editar Servicio @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/styles.css?v=').time() }}">
@endsection

@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Servicio</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="petname" type="text" name="name" placeholder="Nombre" autocomplete="off" value="{{ $service->name }}">
                        <label for="petname">Nombre</label>
                        <small class="error-text mt-2">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="address" type="text" name="address" placeholder="Dirección" autocomplete="off" value="{{ $service->address }}">
                        <label for="address">Dirección</label>
                        <small class="error-text mt-2">Ingrese al menos 5 carácteres</small>
                        @error('address')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="phone" type="text" name="phone" placeholder="Número de Teléfono" autocomplete="off" value="{{ $service->phone }}">
                        <label for="phone">Número de Teléfono</label>
                        <small class="error-text mt-2">Ingrese un número válido</small>
                        @error('phone')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                    <div class="input-component">
                        <input class="c-text-black" id="email" type="email" name="email" placeholder="Email" autocomplete="off" value="{{ $service->email }}">
                        <label for="email">Email</label>
                        <small class="error-text mt-2">Ingrese un email válido</small>
                        @error('email')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>                    

                <div class="col-lg-8 col-md-12 col-sm-12 form-box form-box-textarea">
                    <label class="form-label" for="form3Example1q">Descripción</label>
                    <textarea type="textarea" id="description" 
                    class="form-control descripcion input-text-area-component shadow-none" placeholder="Ingrese aquí los detalles de su publicación" 
                    name="description" rows="5">{{ $service->description }}</textarea>
                    <small class="error-text">Ingrese al menos 10 carácteres</small>
                    @error('description')
                      <strong style="color: darkred">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                    <label class="form-label" for="type_id">Tipo de servicio</label>
                    <select class="form-select  input-select-component shadow-none" name="service_type_id" id="service_type_id">
                        @forelse ($types as $type)
                            @if ($service->service_type_id == $type->id)
                                <option value="{{ $type->id }}" selected> {{ $type->type }} </option>
                            @else
                                <option value="{{ $type->id }}"> {{ $type->type }} </option>
                            @endif
                        @empty
                            <option selected disabled>No hay tipos disponibles.</option>
                        @endforelse
                    </select>
                    <small class="error-text mt-2">Seleccione una opción válida</small>
                    @error('service_type_id')
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
            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Actualizar Servicio</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('JS')
<script src="{{ asset('js/admin-validate-service.js?v='.time()) }}"></script>
@endsection
