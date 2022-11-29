@extends('layouts.layout-admin')
@section('title') Editar Servicio @endsection
@section('content')

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $service->name }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Dirección</label>
                <input type="text" name="address" id="" class="form-control" value="{{ $service->address }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="" class="form-control" value="{{ $service->phone }}">
                 @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ $service->email }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $service->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Tipo de Servicio</label>
                <select name="type_id" id="" class="form-control type_id" aria-label="Default select example">
                    @forelse ($types as $type)
                        @if ($service->type_id == $type->id)
                            <option value="{{ $type->id }}" selected> {{ $type->type }} </option>
                        @else
                            <option value="{{ $type->id }}"> {{ $type->type }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay tipos disponibles.</option>
                    @endforelse
                </select>
                @error('type_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Foto Portada</label>
                <input type="file" name="photo" id="" class="form-control">
                @error('photo')
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

