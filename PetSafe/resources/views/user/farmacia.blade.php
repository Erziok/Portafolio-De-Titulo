@extends('layouts.layout-user')

@section('title') Farmacia @endsection

@section('content')

<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 content rounded-3">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold text-center">Farmacia municipal</h1><br>
                <p class="fs-6">
                    Hemos seleccionado más de 50 medicamentos más comprado para nuestras mascotas, 
                    los que tendrán descuentos desde un 4% hasta un 60 % de su valor referencial. 
                    El único requisito es contar con la inscripción de sus macotas con el microchip en 
                    <a href="https://www.registrocanino.cl" target="_blank">www.registrocanino.cl</a>   
                    y presentar el carnet de atención veterinaria o receta de medicamentos.
                </p>
                <p class="fs-6">
                    ¿Como accedo al beneficio?
                </p>
                <p class="fs-6">
                    Revisa el listado de medicamentos que tenemos con descuento. Para acceder a ellos, 
                    debes ir de forma directa a nuestra farmacia o puedes solicitar tu remedio a través 
                    de los siguientes teléfonos: +56 2 22244559 Por compras superiores a $10.000- tienes 
                    despacho gratuito.
                </p><br>

                <div class="price-list-section ">
                    <div class="price-list-container mt-3 g-0">
                        <div class="price-list-item">
                            <a href="{{ asset('documents/precio-medicamentos.pdf') }}" target="_blank">
                                <div class="price-list-box text-center">
                                    <p>Obtener lista de precios</p>
                                </div>  
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>

@endsection