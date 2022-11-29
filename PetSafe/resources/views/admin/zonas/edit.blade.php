@extends('layouts.layout-admin')
@section('title') Crear Zona Canina @endsection
@section('content')

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.canineArea.update', $canineArea) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mt-3">
                <label for="">Titulo</label>
                <input type="text" name="title" id="" class="form-control" value="{{ $canineArea -> title }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Comentario</label>
                <textarea class="form-control" name="comment" id="" cols="30" rows="5">{{ $canineArea -> comment}}</textarea>
                @error('comment')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Enlace</label>
                <input type="text" name="url" id="" class="form-control" value="{{ $canineArea -> url }}">
                @error('url')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Foto</label>
                <input type="file" name="photo" id="" class="form-control">
                @error('photo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Estado</label>
                <select name="active" class="form-control active" aria-label="Default select example">
                    @if ($canineArea->active == 1)
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactiva</option>
                    @else
                        <option value="1">Activo</option>
                        <option value="2" selected>Inactiva</option>
                    @endif
                </select>
                @error('active')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Beneficios</label>
                <select name="benefit_id" id="" class="form-control benefit_id" aria-label="Default select example">
                    @forelse ($benefits as $benefit)
                        @if ($benefit->id == $canineArea->benefit_id)
                            <option value="{{ $benefit->id }}" selected> {{ $benefit->name }} </option>
                        @else
                            <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay beneficios disponibles.</option>
                    @endforelse
                </select>
                @error('benefit_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection