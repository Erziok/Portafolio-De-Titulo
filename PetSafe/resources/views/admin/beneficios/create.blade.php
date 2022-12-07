@extends('layouts.layout-admin')
@section('title') Crear Beneficio @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Crear Beneficio</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.benefit.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <div class="input-component">
                        <input class="c-text-black" id="name" type="text" name="name" placeholder="Nombre" autocomplete="off" value="">
                        <label for="name">Nombre</label>
                        @error('name')
                            <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
                    <label for="descriptions">Descripción</label>
                    <textarea class="form-control input-text-area-component shadow-none" name="description" id="descriptions" cols="30" rows="4"></textarea>
                    @error('description')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-select mt-4">
                    <label class="form-label" for="active">Estado</label>
                    <select class="form-select input-select-component shadow-none" name="active" id="active">
                        <option selected disabled>seleccionar...</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactiva</option>
                    </select>
                    @error('active')
                        <strong style="color: darkred">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <label class="form-label" for="benefit_type_id">Tipo de Beneficio</label>
                    <select id="benefit_type_id" name="benefit_type_id" class="form-select benefit_id input-select-component shadow-none" aria-label="Default select example">
                        <option selected disabled>seleccionar...</option>
                        @forelse ($types as $type)
                            <option value="{{ $type->id }}"> {{ $type->type }} </option>
                        @empty
                            <option selected disabled>No hay tipos disponibles.</option>
                        @endforelse
                    </select>
                    @error('benefit_type_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
                    <label for="">Usuario</label>
                    <select name="user_id" class="form-control user_id" aria-label="Default select example">
                        <option selected disabled>seleccionar...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->firstname.' '. $user->lastname}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="btn-component mt-5">
                <button class="btn-default" type="submit">Crear Beneficio</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script>
        $(document).ready(function() {
        $('.user_id').select2();
        });
    </script>
@endsection