@extends('layouts.layout-user')

@section('title') Zonas Caninas @endsection

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/publicacion.css') }}">
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
@endsection

@section('content')

    <header class="py-5">
        <div class="container">
            <div class="p-4 info-container">
                <div class="">
                    @if (!empty($beneficio))
                        <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">{{ $beneficio->name }}</h1>
                        <div class="hline mb-5"></div>
                        <p class="fs-6">
                            {{$beneficio->description}}
                        </p>
                        @forelse ($zonas as $zona)
                            <div class="publication-box">
                                <div class="card-header">
                                    <h3 class="fw-bold text-left c-text-black">{{$zona->title}}</h2>
                                </div>
                                <div class="card-body">
                                    <p class="fs-6">
                                        {{$zona->comment}}
                                    </p>
                                    <p class="f-size-sm mt-3 c-text-gray-2">
                                        <i class="fa-solid fa-circle-info"></i> Esta es una imagen referencial del mapa, si quieres tener una vista más completa has click en la imagen.
                                    </p>
                                    <a href="{{ $zona->url }}" target="_blank"><img src="{{ asset($zona->photo) }}" alt="" class="maps"></a> 
                                </div>
                            </div>
                        @empty
                        <h2>Oops, al parecer aún no hay ninguna zona canina registrada.</h2>
                        @endforelse
                    @else
                    <h2>Oops, al parecer aún no hay ninguna zona canina registrada.</h2>
                    @endif                    
                </div>
            </div>
        </div>
    </header>
    @if ($zonas->hasPages())
        <div class="mt-4 mb-5">
            <div class="info-container p-2">
                <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                    <div class="m-2 m-lg-3">
                        {{ $zonas->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="pt-4 pb-5"></div>
    @endif
@endsection

@section('JS')
    <script src="{{ asset('js/components.js') }}"></script>
@endsection

