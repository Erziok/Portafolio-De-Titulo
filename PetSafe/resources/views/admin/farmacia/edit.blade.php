@extends('layouts.layout-admin')
@section('title') Editar Farmacia @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.medicine.update', $medicine) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $medicine->name }}">
            </div>
            @error('name')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Principio activo</label>
                <input type="text" name="activeSubstance" id="activeSubstance" class="form-control" value="{{ $medicine->activeSubstance }}">
            </div>
            @error('activeSubstance')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Función</label>
                <input type="text" name="function" id="function" class="form-control" value="{{ $medicine->function }}">
            </div>
            @error('function')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Aplicación</label>
                <input type="text" name="implementation" id="implementation" class="form-control" value="{{ $medicine->implementation }}">
            </div>
            @error('implementation')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Laboratorio</label>
                <input type="text" name="laboratory" id="laboratory" class="form-control" value="{{ $medicine->laboratory }}">
            </div>
            @error('laboratory')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Especie</label>
                <input type="text" name="specie" id="specie" class="form-control" value="{{ $medicine->specie }}">
            </div>
            @error('specie')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Precio</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $medicine->price }}">
            </div>
            @error('price')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Descuento</label>
                <input type="text" name="discount" id="discount" class="form-control" value="{{ $medicine->discount }}">
            </div>
            @error('discount')
                    <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mt-3">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-control benefit_id" aria-label="Default select example">
                    <option value="{{ $medicine->benefit_id }}">{{ $medicine->benefit->name }}</option>
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