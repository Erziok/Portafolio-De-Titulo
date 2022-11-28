@extends('layouts.layout-user')

@section('title') Créditos @endsection
<link href="{{ asset('css/credits.css?v=').time() }}" rel="stylesheet" >
@section('CSS')

@endsection

@section('content')

<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 content rounded-3">
            <div class="credits-logo">
                <img src="{{ asset('images/preloader_logo.png') }}" alt="">
            </div>
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold text-center">Equipo de PetSafe</h1><br>      
            </div>   
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center roles">
                    <h4><i class="fa-solid fa-users"></i> Jefa de Proyecto</h4>
                    <h5>Valeria Céspedes</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center roles">
                    <h4><i class="fa-solid fa-magnifying-glass-chart"></i> Analista Funcional</h4>
                    <h5>Gustavo Acuña</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center roles">
                    <h4><i class="fa-solid fa-database"></i> Base de Datos</h4>
                    <h5>Benjamín Pérez</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center roles">
                    <h4><i class="fa-solid fa-pen-nib"></i> Diseñadora</h4>
                    <h5>Romina Flores</h5>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 text-center roles">
                    <h4><i class="fa-solid fa-computer"></i> Programador</h4>
                    <h5>Eduardo Poblete</h5>
                </div>
            </div>
            <hr>
            <div>
                <p>
                    "Agradacer a todas las personas que trabajaron en este proyecto, desde 
                    documentación, planificación y desarrollo de este. Gracias a ustedes PetSafe es la plataforma
                    que hoy podemos ver en correcto funcionamiento."
                </p>
                <p>- Eduardo</p>
            </div>
            <hr>
        </div>
    </div>
</header>

@endsection