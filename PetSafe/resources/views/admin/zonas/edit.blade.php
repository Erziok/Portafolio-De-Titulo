@extends('layouts.layout-admin')
@section('title') Crear Zona Canina @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Zona Canina</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.canineArea.update', $canineArea) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <div class="input-component">
                    <input class="c-text-black" id="title" type="text" name="title" placeholder="Titulo" autocomplete="off" value="{{ $canineArea->title }}">
                    <label for="title">Titulo</label>
                    @error('title')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Comentario</label>
                <textarea class="form-control input-text-area-component shadow-none" name="comment" id="" cols="30" rows="4">{{ $canineArea->comment }}</textarea>
                @error('comment')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                @enderror
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <div class="input-component">
                    <input class="c-text-black" id="url" type="text" name="url" placeholder="Enlace" autocomplete="off" value="{{ $canineArea -> url }}">
                    <label for="url">Enlace</label>
                    @error('url')
                        <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Foto</label>
                <input type="file" name="photo" id="" class="form-control input-file-component shadow-none">
                @error('photo')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-select mt-4">
                <label class="form-label" for="form3Example1q">Estado</label>
                <select class="form-select input-select-component shadow-none" name="active" id="active">
                    @if ($canineArea->active == 1)
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
            <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                    <option selected disabled>Seleccionar...</option>
                    @forelse ($benefits as $benefit)
                        @if ($canineArea->benefit_id == $benefit->id)
                            <option value="{{ $benefit->id }}" selected> {{ $benefit->name }} </option>
                        @else
                            <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay roles disponibles.</option>
                    @endforelse
                </select>
                @error('benefit_id')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</small>
                @enderror
            </div>
            
            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Actualizar Medicamento</button>
            </div>
        </form>
    </div>
</div>
@endsection