@extends('layouts.layout-user')

@section('title') Servicios @endsection

@section('CSS')
    <link rel="stylesheet" href="{{ asset('/css/servicio.css') }}">
@endsection
@section('content')

    
<body>
    <header class="my-5 mb-5">
        <div class="container px-lg-5">
            {{-- New Service button --}}
            <div class="new-publication-section ">
                <div class="new-publication-container">
                    <div class="new-publication-item">
                        <a href="{{ route('formulario-servicio') }}">
                            <div class="new-publication-box text-center">
                                <i class="fa-solid fa-plus"></i> Nuevo Servicio
                            </div>  
                        </a>
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
                                        <div class="item date"><i class="fa-solid fa-calendar"></i> {{ $dato->created_at->toDateString() }} </div>
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
    @endsection

</body>