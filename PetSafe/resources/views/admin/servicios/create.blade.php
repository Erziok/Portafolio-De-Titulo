@extends('layouts.layout-admin')

@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.service.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="" class="form-control">
                
            </div>
            <div class="form-group mt-3">
                <label for="">Dirección</label>
                <input type="text" name="address" id="" class="form-control">
                
            </div>
            <div class="form-group mt-3">
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="">Tipo de Servicio</label>
                <select name="type_id" id="" class="form-control" aria-label="Default select example">
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}"> {{ $type->type }} </option>
                    @empty
                        <option selected disabled>No hay tipos disponibles.</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection