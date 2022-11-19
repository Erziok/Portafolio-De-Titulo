@extends('layouts.layout-user')

    @section('content')

        <header class="py-5">
            <div class="container px-lg-5">
                @if (!empty($medicamentos[0]))
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
                            @foreach ($medicamentos as $medicamento)
                                <tr>
                                    <th scope="row">{{$medicamento->name}}</th>
                                    <td>{{$medicamento->activeSubstance}}</td>
                                    <td>{{$medicamento->function}}</td>
                                    <td>{{$medicamento->implementation}}</td>
                                    <td>{{$medicamento->laboratory}}</td>
                                    <td>{{$medicamento->specie}}</td>
                                    <td>{{$medicamento->price}}</td>
                                    <td>{{$medicamento->discount}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <h2 class="text-secondary">Oops! De momento no hay medicamentos registrados, vuelva a intentarlo más tarde.</h2>
                @endif
            </div>
        </header>

    @endsection