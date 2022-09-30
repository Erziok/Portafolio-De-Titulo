@extends('layouts.layout-user')

    @section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold text-center">Zonas caninas</h1><br>
                    <p class="fs-6">
                        Lorem Ipsum is simply dummy text of the printing and typesetting 
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        1500s, when an unknown printer took a galley of type and scrambled it to make a 
                        type specimen book. It has survived not only five centuries, but also the leap into 
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 
                        1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                        recently with desktop publishing software like Aldus PageMaker including versions 
                        of Lorem Ipsum.
                    </p><br>
                    <h3 class="fw-bold text-left">Parque García de la Huerta</h2>
                        <p class="fs-6">
                            Lorem Ipsum is simply dummy text of the printing and typesetting 
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                            1500s, when an unknown printer took a galley of type and scrambled it to make a 
                            type specimen book. It has survived not only five centuries, but also the leap into 
                            electronic typesetting, remaining essentially unchanged. It was popularised in the 
                            1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                            recently with desktop publishing software like Aldus PageMaker including versions 
                            of Lorem Ipsum.
                        </p><br>
                        <img src="{{ asset('images/parque-garcia.png') }}" alt="" class="maps">
                    <h3 class="fw-bold text-left">Plaza Colón</h2>
                    <p class="fs-6">
                        Lorem Ipsum is simply dummy text of the printing and typesetting 
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        1500s, when an unknown printer took a galley of type and scrambled it to make a 
                        type specimen book. It has survived not only five centuries, but also the leap into 
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 
                        1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
                        recently with desktop publishing software like Aldus PageMaker including versions 
                        of Lorem Ipsum.
                    </p><br>
                    <img src="{{ asset('images/plaza-colon.png') }}" alt="" class="maps">
                </div>
            </div>
        </div>
    </header>

    @endsection

