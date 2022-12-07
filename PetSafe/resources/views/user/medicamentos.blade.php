@extends('layouts.layout-user')

    @section('content')
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="info-container p-4">
                @if (!empty($beneficio))
                    <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">{{ $beneficio->name }}</h1>
                    <div class="hline mb-5"></div>
                    <p>
                        {{ $beneficio->description}}
                    </p><br>
                    <div class="container px-lg-5">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Sustancia Activa</th>
                                        <th scope="col">Función</th>
                                        <th scope="col">Implementación</th>
                                        <th scope="col">Laboratorio</th>
                                        <th scope="col">Especie</th>
                                        <th scope="col">Precio (con descuento)</th>
                                        <th scope="col">Descuento</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($beneficio->medicine as $medicamento)
                                        <tr>
                                            <th scope="row">{{$medicamento->name}}</th>
                                            <td>{{$medicamento->activeSubstance}}</td>
                                            <td>{{$medicamento->function}}</td>
                                            <td>{{$medicamento->implementation}}</td>
                                            <td>{{$medicamento->laboratory}}</td>
                                            <td>{{$medicamento->specie}}</td>
                                            <td>{{$medicamento->price}}</td>
                                            <td>{{$medicamento->discount}}%</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                @else
                    <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">Farmacia Municipal</h1>
                    <div class="hline mb-5"></div>
                    <h2 class="text-secondary">Oops! De momento no hay medicamentos registrados, vuelva a intentarlo más tarde.</h2>
                @endif
            </div>
        </div>
    </header>
    @endsection