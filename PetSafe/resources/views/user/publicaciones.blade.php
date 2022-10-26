@extends('layouts.layout-user')
    @section('CSS')
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
    @endsection
    @section('content')

    

    <header class="my-5 mb-5">
        <div class="container px-lg-5">
            
            {{-- New Publication button --}}
            <div class="new-publication-section ">
                <div class="new-publication-container">
                    <div class="new-publication-item">
                        <a href="{{ route('formulario-mascota') }}">
                            <div class="new-publication-box text-center">
                                <i class="fa-solid fa-plus"></i> Nueva Publicación
                            </div>  
                        </a>
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
                                <form action="{{ route('filter') }}" method="GET" id="filter-form">
                                    <input type="text" id="filter-input" class="d-none" name="filter">
                                </form>
                                <li class="options" value="2">Mascotas Perdidas</li>
                                <li class="options" value="3">Mascotas Encontradas</li>
                                <li class="options" value="1">Mascotas en Adopción</li>
                            </ul>
                        </div>
                        <div class="input-box">
                            <form action="{{ route('search') }}" method="GET" id="search-form">
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
                                <a href="{{ route('detalle') }}"><img src="{{ asset($dato->photo) }}" alt=""></a>
                            </div>
                            <div class="content-box col-lg-8">
                                <div class="details mb-3">
                                    <div class="left">
                                        <div class="item date"><i class="fa-solid fa-calendar"></i> {{ $dato->incidentDate }}</div>
                                        <div class="item author"><i class="fa-solid fa-user"></i> {{ $dato->user_id }} (momentaneo) </div>
                                        <div class="item comments"><i class="fa-solid fa-message"></i> 10</div>
                                        <div class="item favs"><i class="fa-solid fa-heart"></i> 5</div>
                                    </div>
                                    <div class="right">
                                        <div class="add-fav">
                                            <label>
                                                <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                                <i class="fa-regular fa-heart active favorite fav-icon"></i>
                                                <i class="fa-solid fa-heart no-favorite fav-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info mb-lg-3">
                                    <h4>{{ $dato->title }}</h4>
                                    <p>{{ $dato->description }}</p>
                                </div>
                                <div class="action mb-1 mt-lg-4 mb-lg-4">
                                    <a href="{{ route('detalle') }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center mt-4 mb-4">
                        <h3 class="text-secondary">Oops... Al parecer no hay Publicaciones Agregadas...</h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 mb-5">
        <div class="container px-lg-5">
            <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                <div class="m-2 m-lg-3">
                    {{ $datos->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('JS')
        <script src="{{ asset('/js/publicacion.js') }}"></script>
    @endsection