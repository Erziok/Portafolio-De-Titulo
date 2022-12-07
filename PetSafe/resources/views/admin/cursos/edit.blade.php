@extends('layouts.layout-admin')
@section('title') Editar Curso @endsection
@section('content')

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Curso</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.course.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre" autocomplete="off" value="{{ $course->name }}" >
                        <label for="name">Nombre</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="phone" type="text" name="phone" placeholder="Teléfono" autocomplete="off" value="{{ $course->phone }}" >
                        <label for="phone">Teléfono</label>
                        @error('phone')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Descripción</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="description" id="" cols="30" rows="4">{{ $course->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Objetivos</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="objectives" id="" cols="30" rows="4">{{ $course->objectives }}</textarea>
                    @error('objectives')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Materiales</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="materials" id="" cols="30" rows="4">{{ $course->materials }}</textarea>
                    @error('materials')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Beneficio</label>
                    <select name="benefit_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                        @forelse ($benefits as $benefit)
                            @if ($benefit->id == $course->benefit_id)
                                <option value="{{ $benefit->id }}" selected> {{ $benefit->name }} </option>
                            @else
                                <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                            @endif
                        @empty
                            <option selected disabled>No hay roles disponibles.</option>
                        @endforelse
                    </select>
                    @error('benefit_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Actualizar Curso</button>
            </div>
        </form>
    </div>
</div>
@endsection

