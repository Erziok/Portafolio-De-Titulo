@extends('layouts.layout-admin')
@section('title') Crear Farmacia @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.medicine.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            @error('name')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Principio activo</label>
                <input type="text" name="activeSubstance" id="activeSubstance" class="form-control">
            </div>
            @error('activeSubstance')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Función</label>
                <input type="text" name="function" id="function" class="form-control">
            </div>
            @error('function')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Aplicación</label>
                <input type="text" name="implementation" id="implementation" class="form-control">
            </div>
            @error('implementation')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Laboratorio</label>
                <input type="text" name="laboratory" id="laboratory" class="form-control">
            </div>
            @error('laboratory')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Especie</label>
                <input type="text" name="specie" id="specie" class="form-control">
            </div>
            @error('specie')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Precio</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            @error('price')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Descuento</label>
                <input type="text" name="discount" id="discount" class="form-control">
            </div>
            @error('discount')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-control benefit_id" aria-label="Default select example">
                    @foreach ($benefits as $benefit)
                        <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('benefit_id')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script>
        $(document).ready(function() {
        $('.benefit_id').select2();
        });
    </script>
@endsection