@extends('layouts.layout-admin')

@section('content')
<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.clinicalProcedure.update', $clinicalProcedure) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $clinicalProcedure->name }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $clinicalProcedure->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Beneficio</label>
                <select name="benefit_id" id="" class="form-control" aria-label="Default select example">
                    @forelse ($benefits as $benefit)
                        @if ($clinicalProcedure->benefit_id == $benefit->id)
                            <option value="{{ $benefit->id }}" selected> {{ $benefit->name }} </option>
                        @else
                            <option value="{{ $benefit->id }}"> {{ $benefit->name }} </option>
                        @endif
                    @empty
                        <option selected disabled>No hay beneficios disponibles.</option>
                    @endforelse
                </select>
                @error('benefit_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ $clinicalProcedure->email }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Número de contacto</label>
                <input type="text" name="phone" id="" class="form-control" value="{{ $clinicalProcedure->phone }}">
                @error('phone')
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