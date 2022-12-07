@extends('layouts.layout-user')

@section('title') Detalle Publicación @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection


@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 info-container">
        <div class="m-2 m-lg-3 publication-section py-3">
            @foreach ($objects as $object)
            <div class="header-course">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="section-title mb-5 mt-2">    
                            <h1 class="c-text-black f-size-xl">{{ $object->name }}</h1>
                            <div class="hline"></div>
                        </div>
                        <div class="section-description mb-5 mt-2">
                            <h5><b class="c-text-purple-1 f-size-md">Descripción</b></h5>    
                            <h6>{{ $object->description }}</h6>
                        </div>
                        <div class="section-objectives mb-5 mt-2">
                            <h5><b class="c-text-purple-1 f-size-md">Objetivos</b></h5>    
                            <h6>{{ $object->objectives }}</h6>
                        </div>
                        <div class="section-materials mb-5 mt-2">
                            <h5><b class="c-text-purple-1 f-size-md">Materiales</b></h5>    
                            <h6>{{ $object->materials }}</h6>
                        </div>
                        <div class="section-phone mb-5 mt-2">
                            <h5><b class="c-text-purple-1 f-size-md">Número de contacto</b></h5>    
                            <h6>{{ $object->phone }}</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="section-sessions mb-5 mt-2">    
                            <h1 class="c-text-black f-size-xl">Sesiones</h1>
                            <div class="hline"></div>
                        </div>
                        @php
                            $contador = 0;    
                        @endphp
                        @forelse ($object->session as $sesion)
                            @php
                                $contador++;
                            @endphp
                            <div>
                                <h5 class="f-size-sm"><b class="c-text-purple-1 f-size-md mb-3">Sesión @php echo $contador; @endphp</b></h5>
                                <h6 class="f-size-sm"><b><i class="fa-regular fa-calendar c-text-purple-2 f-size-md"></i> Fecha:</b> {{ $sesion->date}}</h6>
                                <h6 class="f-size-sm"><b><i class="fa-regular fa-clock c-text-purple-2 f-size-md"></i> Horario:</b> {{ 'De '. $sesion->startHour .' a '. $sesion->endHour .' hrs.' }}</h6>
                                <br>
                            </div>
                        @empty
                            <div>Este servicio no ha agregado un horario aún.</div>
                        @endforelse

                    </div>
                </div>
            </div>    
            
        @endforeach
        </div>
    </div>
</div>
@endsection

@section('JS')
{{-- <script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script> --}}
@endsection