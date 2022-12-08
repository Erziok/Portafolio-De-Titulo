@extends('layouts.layout-admin')
@section('title') Crear Zona Canina @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Zona Canina</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.canineArea.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <div class="input-component">
                    <input class="c-text-black" id="title" type="text" name="title" placeholder="Titulo" autocomplete="off">
                    <label for="title">Titulo</label>
                    @error('title')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Comentario</label>
                <textarea class="form-control input-text-area-component shadow-none" name="comment" id="" cols="30" rows="4"></textarea>
                @error('comment')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                @enderror
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <div class="input-component">
                    <input class="c-text-black" id="url" type="text" name="url" placeholder="Enlace" autocomplete="off">
                    <label for="url">Enlace</label>
                    @error('url')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Foto</label>
                <input type="file" name="photo" id="" class="form-control input-file-component shadow-none">
                @error('photo')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-select mt-4">
                <label class="form-label" for="form3Example1q">Estado</label>
                <select class="form-select input-select-component shadow-none" name="active" id="active">
                    <option selected disabled>Seleccionar...</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactiva</option>
                </select>
                @error('active')
                    <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                    <option selected disabled>Seleccionar...</option>
                    @foreach ($benefits as $benefit)
                        <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                    @endforeach
                </select>
                @error('benefit_id')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                @enderror
            </div>
            
            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear zona canina</button>
            </div>
        </form>
    </div>
</div>
@endsection