@extends('layouts.layout-user')
    @section('CSS')
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
    @endsection

@section('title') Operativos @endsection

@section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 content rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold text-center">Operativos veterinarios</h1><br>
                    
                    <div class="container px-lg-5">
                        <div class="p-2 p-lg-3 rounded-3 text-center">
                            <div class="m-2 m-lg-3">
                                <div class="publications-list">
                                    @forelse ($operativos as $oper)
                                        <!--publication item-->
                                        <div class="publication-box row">
                                            <div class="content-box col-lg-8">
                                                <div class="details mb-3">
                                                    <div class="left">
                                                        <div class="item author"><i class="fa-solid fa-envelope"></i> {{ $oper->email }} </div>
                                                        <div class="item comments"><i class="fa-solid fa-phone"></i> {{ $oper->phone }} </div>
                                                    </div>
                                                </div>
                                                <div class="info mb-lg-3">
                                                    <h4>{{ $oper->name }}</h4>
                                                    <p>{{ $oper->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="text-center mt-4 mb-4">
                                        <h3 class="text-secondary">Oops... No hay operativos activos de momento...</h3>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    @endsection

<!--
    <p class="fs-4 fw-bold">
        Operativos de Vacunación antirrábica
    </p>
    <p class="fs-6">
        El Departamento de Tenencia Responsable de mascotas, a través de las Juntas 
        de Vecinos pone a disposición de la comunidad operativos de vacunación antirrábica 
        de forma gratuita, para caninos y felinos a partir de los 6 meses de edad. 
        <ul>
            <li>
                Las Juntas de Vecinos debe solicitar el servicio a través del correo 
                electrónico dimao@sanbernardo.cl
            </li>
        </ul>
    </p><br>
    <p class="fs-4 fw-bold">
        Operativos de Implantación de Microchip
    </p>
    <p class="fs-6">
        El Departamento de Tenencia Responsable de Mascotas, a través de las Juntas 
        de Vecinos pone a disposición de la comunidad operativos de Implantación de Microchip 
        de forma gratuita para la comunidad gracias a un proyecto financiado por la 
        Subsecretaria de Desarrollo Regional, SUBDER   
        <ul>
            <li>
                Las Juntas de Vecinos debe solicitar el servicio a través del correo 
                electrónico dimao@sanbernardo.cl
            </li>
        </ul>
    </p><br>
    <p class="fs-4 fw-bold">
        Obtén tu documentación para el Registro Nacional de Mascotas:
    </p>
    <p class="fs-6">
        Los dueños de perros y gatos implantados por la Municipalidad pueden inscribir a 
        sus mascotas en 
        <a href="https://www.registratumascota.cl" target="_blank">registratumascota.cl</a>  
        ,descargar aquí el Comprobante de Implantación 
        de Microchip y Declaración Jurada, documentos exigidos al momento de comprar 
        medicamentos en la farmacia de la municipalidad.
    </p>
-->