@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection

@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 bg-light rounded-3">
        <div class="m-2 m-lg-3 publication-section py-3">
            @foreach ($objects as $object)
            <div class="header-publication">
                <div class="section-title mb-5 mt-2">    
                    <h3>{{ $object->name }}</h3>
                    <div class="hline"></div>
                </div>
                @can('publication.tasks', $object)
                <div class="menu-publicacion">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                    <ul class="menu">
                        <li><a href="">Editar</a></li>
                        <li><a href="">Eliminar</a></li>
                    </ul>
                </div>
                @endcan
            </div>
            <div class="publicacion-realizada">
                <div class="usuario-publico">
                    <div class="avatar">
                        <!-- Imágen -->
                        @if (empty($object->user->avatar))
                            <img src="{{ asset('images/placeholder-user.jpg') }}" alt="img">
                        @else
                            <img src="{{ asset($object->user->avatar) }}" alt="img">
                        @endif
                    </div>
                    <div class="contenido-publicacion">
                        <h4>{{ $object->user->firstname.' '.$object->user->lastname }}</h4>
                        <ul>
                            <li>{{ $object->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 section-right">
                    <div class = "pet-imgs">
                        <div class = "img-display">
                            <div class = "img-showcase">
                                <img src = "{{ asset($object->photo) }}" alt = "shoe image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-section col-lg-4">
                    <div class="pet-name">
                        <h3>{{ $object->name }}</h3>
                    </div>
                    <div class="pet-description" id="pet-description">
                        {{ $object->type->type }}
                    </div>
                    <div class="pet-description" id="pet-description">
                        {{ $object->description }}
                    </div>
                    <div class="pet-description" id="pet-description">
                        Fono: {{ $object->phone }}
                    </div>
                    <div class="pet-description" id="pet-description">
                        Direccion: {{ $object->address }}
                    </div>
                    <div class="pet-description" id="pet-description">
                        HORARIO:
                    </div>
                    @forelse ($schedule as $day)
                        <div class="pet-description" id="pet-description">
                            {{ $day->day }} de {{ $day->startHour }} a {{ $day->endHour }}
                        </div>
                    @empty
                        <div class="pet-description" id="pet-description">
                            Este servicio no ha agregado un horario aun...
                        </div>
                    @endforelse
                    </div>
                    <div class="show-more-box">
                        <button class="" id="show-more">Mostrar Más <i class="fa-solid fa-chevron-down"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection

@section('JS')
<script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script>
@endsection