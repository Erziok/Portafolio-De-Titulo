@extends('layouts.layout-user')

@section('title') Veterinaria @endsection

@section('CSS')
    <script src="{{ asset('js/scrollreveal.js') }}"></script>    
@endsection

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-2 info-container">
            <div class="m-3">
                <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">Veterinaria Municipal</h1>
                <div class="hline mb-5"></div>

                <p class="fw-bold c-text-purple-1 f-size-md">
                    Esterilizaciones Caninas:
                </p>
                <p>
                    El servicio se encuentra suspendido, pronto se informará su puesta en marcha.
                </p><br>
                <p class="fw-bold c-text-purple-1 f-size-md">
                    Esterilizaciones Felinas:
                </p>
                <p class="">
                    El Departamento de Tenencia Responsable de Mascotas semanalmente pone a disposición 
                    de los usuarios 45 cupos de esterilización, los que entregan vía telefónica al fono 
                    225788663, los días viernes desde las 09:00 a 11:00 am por orden de entrada de las 
                    llamadas (se recibe un cupo por llamado). La edad de las mascotas para poder acceder 
                    al servicio es desde los 6 meses hasta los 6 años.
                </p><br>
                <p class="fw-bold c-text-purple-1 f-size-md">
                    Operativos de Vacunación antirrábica
                </p>
                <p class="">
                    El Departamento de Tenencia Responsable de mascotas, a través de las Juntas de 
                    Vecinos pone a disposición de la comunidad operativos de vacunación antirrábica 
                    de forma gratuita, para caninos y felinos a partir de los 6 meses de edad. Las Juntas 
                    de Vecinos debe solicitar el servicio a través del correo electrónico dimao@sanbernardo.cl
                </p><br>
                <p class="fw-bold c-text-purple-1 f-size-md">
                    Operativos de Implantación de Microchip
                </p>
                <p class="">
                    El Departamento de Tenencia Responsable de Mascotas, a través de las Juntas de Vecinos 
                    pone a disposición de la comunidad operativos de Implantación de Microchip de forma 
                    gratuita para la comunidad gracias a un proyecto financiado por la Subsecretaria de 
                    Desarrollo Regional, SUBDERE. Las Juntas de Vecinos debe solicitar el servicio a través 
                    del correo electrónico dimao@sanbernardo.cl
                </p><br>
                <p class="fw-bold c-text-purple-1 f-size-md">
                    Denuncias de la comunidad
                </p>
                <p class="">
                    Este departamento puede realizar inspecciones por denuncias de la comunidad por 
                    infracciones a la legislación vigente, para esto debe asistir de forma presencial a 
                    la dirección de Medio Ambiente, Aseo y Ornato o a través del correo electrónico 
                    dimao@sanbernardo.cl
                </p><br>
                <p class="">
                    <i class="fa-solid fa-circle-user c-text-purple-2 f-size-md"></i> Veterinaria: Liliana Ortiz Méndez
                </p>
                <p class="">
                    <i class="fa-solid fa-phone c-text-purple-2 f-size-md"></i> Teléfono: 225788663
                </p>
                <p class="">
                    <i class="fa-solid fa-envelope c-text-purple-2 f-size-md"></i> Correo: dimao@sanbernardo.cl
                </p><br>
                <p class="fw-bold">
                    <i class="fa-solid fa-clock c-text-purple-2 f-size-md"></i> Horario de Atención:
                </p>
                <p class="">
                    Lunes a viernes de 08:30 a 13:30 hrs. , para consultas sobre los servicios o entrega de 
                    denuncios.
                </p>
            </div>
        </div>
    </div>
</header>
@endsection