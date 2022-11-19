@extends('layouts.layout-user')

@section('title') Detalle Servicio @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection

@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 bg-light rounded-3">
        <div class="m-2 m-lg-3 publication-section py-3">
            @foreach ($services as $service)
            <div class="header-publication">
                <div class="section-title mb-1 mt-2">    
                    <h1>{{ $service->name }}</h1>
                    <div class="hline"></div>
                </div>
                @can('service.tasks', $service)
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
                <div class="mb-4">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div>
                <div class="usuario-publico">
                    <div class="avatar">
                        @if (empty($service->user->avatar))
                            <img src="{{ asset('images/placeholder-user.jpg') }}" alt="img">
                        @else
                            <img src="{{ asset($service->user->avatar) }}" alt="img">
                        @endif
                    </div>
                    <div class="contenido-publicacion">
                        <h2>{{ $service->user->firstname.' '.$service->user->lastname }}</h2>
                        <ul>
                            <li>{{ $service->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 section-right">
                    <div class = "detail-imgs">
                        <div class = "img-display">
                            <div class = "img-showcase">
                                <img src="{{ asset('images/placeholder-image.jpg') }}" alt="">
                                {{--<img src = "{{ asset($service->photo) }}" alt = "shoe image">--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-section col-lg-4">
                    <div class="detail-subtitle">
                        <h2><b>{{ $service->type->type }}</b></h2>
                    </div>
                    <div class="detail-description" id="detail-description">
                        <h3 class="mt-3"><b>Dirección</b></h3>
                        <p class="description-item">{{ $service->address }}</p>
                        <h3 class="mt-3"><b>Teléfono / Celular</b></h3>
                        <p class="description-item">{{ $service->phone }}</p>
                        <h3 class="mt-3"><b>Email</b></h3>
                        <p class="description-item">{{ $service->email }}</p>
                        <h3 class="mt-3"><b>Descripción</b></h3>
                        {{ $service->description }}
                        <br><h3 class="mt-3"><b>Horario</b></h3>
                        <ul>
                            @forelse ($service->schedule as $horario)
                                <li><p>{{ $horario->day .' de '. $horario->startHour .' a '. $horario->endHour}}</p></li>
                            @empty
                                <li>Este servicio no ha agregado un horario aún.</li>
                            @endforelse
                        </ul>
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