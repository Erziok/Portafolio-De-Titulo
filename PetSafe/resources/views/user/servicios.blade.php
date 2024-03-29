@extends('layouts.layout-user')

@section('title') Servicios @endsection

@section('CSS')
    <link rel="stylesheet" href="{{ asset('/css/servicio.css') }}">
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
@endsection
@section('content')

    
<body>
    <header class="my-5 mb-5">
        <div class="container px-lg-5">
            
            {{-- New Service button --}}
            <div class="text-center mb-3">
                <div class="btn-component">
                    <div class="btn-wrapper">
                        @if (!$serviciosPendientes)
                            <a href="{{ route('formulario-servicio') }}" class="btn-action">Nuevo Servicio</a>
                            <span><i class="fa-solid fa-plus"></i></span>                       
                        @endif
                    </div>
                </div>    
            </div>
            <div class="p-1 rounded-3 text-center">
                <div class="m-2 m-lg-3 search-bar-container">
                    <div class="search-bar">
                        <div class="select-box" id="select">
                            <div class="search-wrapper">
                                <span id="select-text">Buscar Por</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <ul id="list">
                                <form action="{{ route('service-filter') }}" method="GET" id="filter-form">
                                    <input type="text" autocomplete="off" id="filter-input" class="d-none" name="filter">
                                </form>
                                <li class="options" value="4">Negocio</li>
                                <li class="options" value="3">Pyme</li>
                                <li class="options" value="2">Farmacia</li>
                                <li class="options" value="1">Veterinaria</li>
                            </ul>
                        </div>
                        <div class="input-box">
                            <form action="{{ route('service-search') }}" method="GET" id="search-form">
                                @if (!empty($valor))
                                    <input type="text" placeholder="" id="search-inpt" value="{{ $valor }}" name="field">
                                @else
                                    <input type="text" placeholder="" id="search-inpt" name="field">
                                @endif
                                <i class="fa-solid fa-xmark remove-search-field" id="remove-search-field"></i>
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5">
        <div class="p-2 p-lg-3 rounded-3 text-center">
            <div class="m-2 m-lg-3">
                <div class="publications-list">
                    @forelse ($datos as $dato)
                        <!--publication item-->
                        <div class="publication-box row">
                            <div class="image-box col-lg-4">
                                <a href="{{ route('detalle', $dato->id) }}"><img src="{{ asset($dato->photo) }}" alt=""></a>
                            </div>
                            <div class="content-box col-lg-8">
                                <div class="details mb-3">
                                    <div class="left">
                                        <div class="item date"><i class="fa-solid fa-calendar"></i> {{ dateToFormat_ES($dato->created_at->toDateString());}} </div>
                                        <div class="item author"><i class="fa-solid fa-user"></i> {{ $dato->user->firstname }} </div>
                                        <div class="item email"><i class="fa-solid fa-envelope"></i> {{ $dato->email }} </div>
                                    </div>
                                </div>
                                <div class="info mb-lg-3">
                                    <h4>{{ $dato->name }}</h4>
                                    <p>{{ Str::limit($dato->description, 300) }}</p>
                                </div>
                                <div class="action mb-1 mt-lg-4 mb-lg-4">
                                  <a href="{{ route('detalle-servicio', $dato->id) }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center mt-4 mb-4">
                        <h3 class="text-secondary">Oops... Al parecer no hay Servicios Disponibles...</h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @if ($datos->hasPages())
        <div class="my-5 mb-5">
            <div class="container px-lg-5">
                <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                    <div class="m-2 m-lg-3">
                        {{ $datos->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @endsection

    @section('JS')
        <script src="{{ asset('/js/servicio.js') }}"></script>
        <script src="{{ asset('js/components.js') }}"></script>
    @endsection

</body>