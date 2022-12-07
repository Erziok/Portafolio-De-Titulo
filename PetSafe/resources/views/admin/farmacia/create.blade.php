@extends('layouts.layout-admin')
@section('title') Crear Farmacia @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Medicamento</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.medicine.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre" autocomplete="off">
                        <label for="name">Nombre</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="activeSubstance" type="text" name="activeSubstance" placeholder="Principio activo" autocomplete="off">
                        <label for="activeSubstance">Principio activo</label>
                        @error('activeSubstance')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="function" type="text" name="function" placeholder="Función" autocomplete="off">
                        <label for="function">Función</label>
                        @error('function')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="implementation" type="text" name="implementation" placeholder="Aplicación" autocomplete="off">
                        <label for="implementation">Aplicación</label>
                        @error('implementation')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="laboratory" type="text" name="laboratory" placeholder="Laboratorio" autocomplete="off">
                        <label for="laboratory">Laboratorio</label>
                        @error('laboratory')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="specie" type="text" name="specie" placeholder="Especie" autocomplete="off">
                        <label for="specie">Especie</label>
                        @error('specie')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="price" type="number" name="price" placeholder="Precio" autocomplete="off">
                        <label for="price">Precio</label>
                        @error('price')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="discount" type="text" name="discount" placeholder="Descuento" autocomplete="off">
                        <label for="discount">Descuento</label>
                        @error('discount')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                <label for="">Beneficio</label>
                <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                    @foreach ($benefits as $benefit)
                        <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                    @endforeach
                </select>
                @error('benefit_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            

            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear Medicamento</button>
            </div>
        </form>
    </div>
</div>
@endsection

