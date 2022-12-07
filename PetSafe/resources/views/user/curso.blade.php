@extends('layouts.layout-user')
  @section('title') Curso @endsection
    @section('CSS')
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
        <script src="{{ asset('js/scrollreveal.js') }}"></script>
    @endsection
    
    @section('content')
    <header class="pt-5">
        <div class="container px-lg-5">
            <div class="p-4 info-container">
                @if (!empty($beneficio))
                <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">{{ $beneficio->name }}</h1>
                <div class="hline mb-5"></div>
                <p>
                    {{ $beneficio->description}}
                </p><br>

                <div class="publications-list">
                    @forelse ($cursos as $curso)
                    <div class="publication-box row">
                        <div class="content-box col-lg-8">
                            <div class="info mb-lg-3">
                                <h4>{{ $curso->name }}</h4>
                                <p>{{ Str::limit($curso->description, 300) }}</p>
                            </div>
                            <div class="action mb-1 mt-lg-4 mb-lg-4">
                                <a href="{{ route('detalle-curso', $curso->id) }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h2 class="text-secondary">Oops! De momento no hay cursos añadidos.</h2>
                    @endforelse
                </div>
            @else
                <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">Cursos de adiestramiento Municipal</h1>
                <div class="hline mb-5"></div>
                <h2 class="text-secondary">Oops! De momento no hay un beneficio asignado, intentelo más tarde.</h2>
            @endif
            </div>
        </div>
    </header>
    @if ($cursos->hasPages())
        <div class="mt-4 mb-5">
            <div class="info-container p-2">
                <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                    <div class="m-2 m-lg-3">
                        {{ $cursos->onEachSide(5)->links() }}
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

    
