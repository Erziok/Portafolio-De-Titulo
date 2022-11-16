@extends('layouts.layout-admin')

@section('content')
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
                <select name="benefit_id" id="" class="form-control" aria-label="Default select example">
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