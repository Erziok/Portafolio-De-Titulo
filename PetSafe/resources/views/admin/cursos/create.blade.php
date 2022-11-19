@extends('layouts.layout-admin')
@section('title') Crear Beneficio @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.course.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="" class="form-control">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Objetivos</label>
                <textarea class="form-control" name="objectives" id="" cols="30" rows="10"></textarea>
                @error('objectives')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Materiales</label>
                <input type="text" name="materials" id="" class="form-control">
                @error('materials')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Beneficios</label>
                <select name="benefit_id" id="" class="form-control benefit_id" aria-label="Default select example">
                    @forelse ($benefits as $benefit)
                        <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                    @empty
                        <option selected disabled>No hay beneficios disponibles.</option>
                    @endforelse
                </select>
                @error('benefit_id')
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

@section('JS')
    <script>
        $(document).ready(function() {
        $('.benefit_id').select2();
        });
    </script>
@endsection