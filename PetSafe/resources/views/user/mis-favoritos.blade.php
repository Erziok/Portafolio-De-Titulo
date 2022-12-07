@extends('layouts.layout-user')

@section('title') Mis Favoritos @endsection

@section('CSS')
    <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
@endsection
@section('content')
    <header class="my-5 mb-5">
        <div class="container px-lg-5">
            {{-- New Publication button --}}
            <div class="text-center mb-3">
                <div class="btn-component">
                    <div class="btn-wrapper">
                        <a href="{{ route('formulario-mascota') }}" class="btn-action">Nueva Publicación</a>
                        <span><i class="fa-solid fa-plus"></i></span>
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
                            <div class="publication-overlay">
                            </div>
                            <div class="image-box col-lg-4">
                                <a href="{{ route('detalle', $dato->id) }}"><img src="{{ asset($dato->photo) }}" alt=""></a>
                            </div>
                            <div class="content-box col-lg-8">
                                <div class="details mb-3">
                                    <div class="left">
                                        <div class="item date"><i class="fa-solid fa-calendar"></i> {{ $dato->incidentDate }} </div>
                                        <div class="item author"><i class="fa-solid fa-user"></i> {{ $dato->user->firstname }} </div>
                                        <div class="item comments"><i class="fa-solid fa-message"></i> {{ $dato->comment_count }} </div>
                                        <div class="item favs d-flex align-items-center"><i class="fa-solid fa-heart"></i><div class="fav-counter"> {{$dato->favourite_count }}</div></div>
                                    </div>
                                    <div class="right">
                                        <div class="add-fav">
                                            <label>
                                                @if (auth()->check())
                                                    <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                                    @php $find = false; @endphp
                                                    @foreach($dato->favourite as $favourite)
                                                        @if (auth()->id() == $favourite->user_id && $favourite->publication_id == $dato->id)
                                                            <i class="fa-solid fa-heart active no-favorite fav-icon" data-fav='{{$dato->id}}'></i>
                                                            <i class="fa-regular fa-heart favorite fav-icon" data-fav='{{$dato->id}}'></i>
                                                            @php $find = true; @endphp
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if ($find == false)
                                                        <i class="fa-regular fa-heart active favorite fav-icon" data-fav='{{$dato->id}}'></i>
                                                        <i class="fa-solid fa-heart no-favorite fav-icon" data-fav='{{$dato->id}}'></i>
                                                    @endif
                                                @else
                                                    <i class="fa-regular fa-heart disable-favorite fav-icon"></i>
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info mb-lg-3">
                                    <h4>{{ $dato->title }}</h4>
                                    <p>{{ Str::limit($dato->description, 300) }}</p>
                                </div>
                                <div class="action mb-1 mt-lg-4 mb-lg-4">
                                    <a href="{{ route('detalle', $dato->id) }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
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
        <script src="{{ asset('/js/publicacion.js') }}"></script>
        <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
        <script src="{{ asset('js/components.js') }}"></script>
    @endsection