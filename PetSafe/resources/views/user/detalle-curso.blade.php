@extends('layouts.layout-user')

@section('title') Detalle Publicación @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection


@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 bg-light rounded-3">
        <div class="m-2 m-lg-3 publication-section py-3">
            @foreach ($objects as $object)
            <div class="header-course">
                <div class="section-title mb-5 mt-2">    
                    <h1>{{ $object->name }}</h1>
                    <div class="hline"></div>
                </div>
                <div class="section-description mb-5 mt-2">
                    <h5><b>Descripción</b></h5>    
                    <h6>{{ $object->description }}</h6>
                </div>
                <div class="section-objectives mb-5 mt-2">
                    <h5><b>Objetivos</b></h5>    
                    <h6>{{ $object->objectives }}</h6>
                </div>
                <div class="section-materials mb-5 mt-2">
                    <h5><b>Materiales</b></h5>    
                    <h6>{{ $object->materials }}</h6>
                </div>
                <div class="section-phone mb-5 mt-2">
                    <h5><b>Número de contacto</b></h5>    
                    <h6>{{ $object->phone }}</h6>
                </div>
                <hr>
                <div class="section-sessions mb-5 mt-2">    
                    <h1>Sesiones</h1>
                    <div class="hline"></div>
                </div>
                <ul>
                    @forelse ($object->session as $sesion)
                        <li>
                            <h6><b>Fecha:</b> {{ $sesion->date}}</h6>
                            <h6><b>Horario:</b> {{ 'De '. $sesion->startHour .' a '. $sesion->endHour .' hrs.' }}</h6>
                            <br>
                        </li>
                    @empty
                        <li>Este servicio no ha agregado un horario aún.</li>
                    @endforelse
                </ul>
            </div>    
            
        @endforeach
        </div>
    </div>
</div>
@endsection

@section('JS')
{{-- <script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script> --}}
@endsection