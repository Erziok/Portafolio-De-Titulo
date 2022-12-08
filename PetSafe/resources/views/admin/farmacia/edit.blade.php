@extends('layouts.layout-admin')
@section('title') Editar Farmacia @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Medicamento</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.medicine.update', $medicine) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre" autocomplete="off" value="{{ $medicine->name }}">
                        <label for="name">Nombre</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="activeSubstance" type="text" name="activeSubstance" placeholder="Principio activo" autocomplete="off" value="{{ $medicine->activeSubstance }}">
                        <label for="activeSubstance">Principio activo</label>
                        @error('activeSubstance')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="function" type="text" name="function" placeholder="Función" autocomplete="off" value="{{ $medicine->function }}">
                        <label for="function">Función</label>
                        @error('function')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="implementation" type="text" name="implementation" placeholder="Aplicación" autocomplete="off" value="{{ $medicine->implementation }}">
                        <label for="implementation">Aplicación</label>
                        @error('implementation')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="laboratory" type="text" name="laboratory" placeholder="Laboratorio" autocomplete="off" value="{{ $medicine->laboratory }}">
                        <label for="laboratory">Laboratorio</label>
                        @error('laboratory')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="specie" type="text" name="specie" placeholder="Especie" autocomplete="off" value="{{ $medicine->specie }}">
                        <label for="specie">Especie</label>
                        @error('specie')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="price" type="number" name="price" placeholder="Precio" autocomplete="off" value="{{ $medicine->price }}">
                        <label for="price">Precio</label>
                        @error('price')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="discount" type="text" name="discount" placeholder="Descuento" autocomplete="off" value="{{ $medicine->discount }}">
                        <label for="discount">Descuento</label>
                        @error('discount')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                    @forelse ($benefits as $benefit)
                        @if ($benefit->id == $medicine->benefit_id)
                            <option value="{{ $benefit->id }}" selected> {{ $benefit->name }} </option>
                        @else
                            <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay roles disponibles.</option>
                    @endforelse
                </select>
            </div>
            @error('benefit_id')
                    <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
            @enderror

            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Actualizar Medicamento</button>
            </div>
        </form>
    </div>
</div>
@endsection
