@extends('layouts.layout-admin')

@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Procedimiento</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.clinicalProcedure.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre del Procedimiento" autocomplete="off">
                        <label for="name">Procedimiento</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Descripción</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="description" id="" cols="30" rows="4"></textarea>
                    @error('description')
                        <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="email" type="email" name="email" placeholder="Email" autocomplete="off">
                        <label for="run">Email</label>
                        @error('email')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="phone" type="email" name="phone" placeholder="Número de contacto" autocomplete="off">
                        <label for="run">Número de contacto</label>
                        @error('phone')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="benefit_id">Beneficio asignado</label>
                    <select class="form-select input-select-component shadow-none" name="benefit_id" id="benefit_id">
                        @forelse ($benefits as $benefit)
                        <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                        @empty
                            <option selected disabled>No hay beneficios disponibles.</option>
                        @endforelse
                    </select>
                    @error('benefit_id')
                        <strong style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear procedimiento</button>
            </div>
        </form>
    </div>
</div>
@endsection