@extends('layouts.layout-user')

    @section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 content rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold text-center">Zonas caninas</h1><br>
                    <p class="fs-6">
                        La iniciativa fomenta la tenencia responsable de mascotas, dentro de la comuna de 
                        San Bernardo, abriendo espacios de esparcimiento para sus perros. Estos están en 
                        constante mejora, de acuerdo con sus necesidades. Los parque y plazas serán infirmadas 
                        por esta sección y se irán agregando más para que todos los vecinos puedan disfrutar 
                        de un rato de paseo en el parque con nuevos amigos.
                    </p><br>
                    <p class="fs-6">
                        <b>Recuerda:</b> En estos caniles, los perros pueden correr sin correa, jugar libremente, 
                        sociabilizando entre ellos, sin molestar a niños o adultos que sólo disfrutan del parque 
                        o plaza.
                    </p><br>
                    <h3 class="fw-bold text-left">Plaza Colón</h2><br>
                    <p class="fs-6">
                        Horario: desde las 9:00 hasta las 12:00 y desde las 17:00 hast las 21:00 hrs
                    </p><br>
                    <p class="fs-6">
                        Mapa del perímetro Zona Canina.
                    </p>
                    <img src="{{ asset('images/zona_colon.png') }}" alt="" class="maps">
                </div>
            </div>
        </div>
    </header>

    @endsection

