@extends('layouts.layout-user')
  @section('title') Curso @endsection
    @section('CSS')
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
    @endsection
    
    @section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 content rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold text-center">Listado de cursos</h1><br>

                    <div class="container px-lg-5">
                        <div class="p-2 p-lg-3 rounded-3 text-center">
                            <div class="m-2 m-lg-3">
                                <div class="publications-list">
                                    @forelse ($cursos as $curso)
                                        <!--publication item-->
                                        <div class="publication-box row">
                                            <div class="content-box col-lg-8">
                                                <div class="info mb-lg-3">
                                                    <h4>{{ $curso->name }}</h4>
                                                    <p>{{ Str::limit($curso->description, 300) }}</p>
                                                </div>
                                                <div class="action mb-1 mt-lg-4 mb-lg-4">
                                                    <a href="{{ route('detalle-curso', $curso->id) }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="text-center mt-4 mb-4">
                                        <h3 class="text-secondary">Oops... No hay cursos activos por el momento...</h3>
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
    <p class="fs-6">
        La municipalidad junto a organizaciones hemos abierto cupos para adiestramiento canino, 
        estos serán abiertos a todo público, previa inscripción, con mascotas con su microchip 
        para evitar extravíos. 
    </p>
    <p class="fs-6">
        Las inscripciones son por el teléfono: +569 222258987
    </p>
    <p class="fs-6">
        El entrenador te dirá el lugar donde se realizarán las sesiones.
    </p><br>
    <p class="fs-6">
        <b>Horarios:</b>
    </p>
    <p class="fs-6">
        Sábados y domingos de 9:00 a 10:30 am 
    </p>
    <ul>
        <li>1 hora y media por sesión, en donde 30 min son teóricos y 1 hora prácticos.</li>
        <li>Serán 8 sesiones y solo serán por previa inscripción del dueño y la mascota.</li>
        <li>Solo se permite 1 persona responsable mayor de 18 años para las sesiones.</li>
    </ul><br>
    <p class="fs-6">
        <b>Debes llevar contigo:</b> Agua para hidratar a tu mascota, snack como apoyo (premios), 
        una mantita para escuchar al entrenador, correa o arnés y mucho ánimo para acompañar 
        a tu mascota.
    </p>
    <p class="fs-6">
        Si no puedes asistir debes llamar al entrenador, si faltas a 2 sesiones quedas fuera 
        de los entrenamientos.
    </p>
    <p class="fs-6">
        Los esperamos.
    </p>
    -->

    
