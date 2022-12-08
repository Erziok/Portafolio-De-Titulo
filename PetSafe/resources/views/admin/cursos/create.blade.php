@extends('layouts.layout-admin')
@section('title') Crear Curso @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Curso</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.course.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre" autocomplete="off" value="" >
                        <label for="name">Nombre</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="phone" type="text" name="phone" placeholder="Teléfono" autocomplete="off" value="" >
                        <label for="phone">Teléfono</label>
                        @error('phone')
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
                    <label for="">Objetivos</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="objectives" id="" cols="30" rows="4"></textarea>
                    @error('objectives')
                        <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Materiales</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="materials" id="" cols="30" rows="4"></textarea>
                    @error('materials')
                        <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Beneficio</label>
                    <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                        @foreach ($benefits as $benefit)
                            <option value="{{ $benefit->id }}"><i class="fa-solid fa-circle-exclamation"></i> {{ $benefit->name }}</option>
                        @endforeach
                    </select>
                    @error('benefit_id')
                        <small class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear Curso</button>
            </div> 
        </form>
    </div>
</div>
@endsection

