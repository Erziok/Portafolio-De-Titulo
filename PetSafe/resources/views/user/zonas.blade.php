@extends('layouts.layout-user')

@section('title') Zonas Caninas @endsection

@section('content')

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 content rounded-3">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold text-center">{{ $beneficio->name }}</h1><br>
                    <p class="fs-6">
                        {{$beneficio->description}}
                    </p>
                    @forelse ($beneficio->canineArea as $area)
                        <div class="card w-100 p-0 mt-3 mb-3">
                            <div class="card-header">
                                <h3 class="fw-bold text-left">{{$area->title}}</h2>
                            </div>
                            <div class="card-body">
                                <p class="fs-6">
                                    {{$area->comment}}
                                </p><br>
                                <p class="fs-6">
                                    Esta es una imagen referencial del mapa, si quieres tener una vista más completa has click en la imagen.
                                </p>
                                <a href="{{ $area->url }}" target="_blank"><img src="{{ asset($area->photo) }}" alt="" class="maps"></a> 
                            </div>
                        </div>
                    @empty
                        <h2>Oops, al parecer aún no hay ninguna zona canina registrada.</h2>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </header>

    @endsection

