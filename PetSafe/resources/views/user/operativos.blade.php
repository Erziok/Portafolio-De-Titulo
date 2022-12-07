@extends('layouts.layout-user')
    @section('CSS')  
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
        <script src="{{ asset('js/scrollreveal.js') }}"></script>  
    @endsection

@section('title') Operativos @endsection

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
                    @forelse ($operativos as $oper)
                        <!--publication item-->
                        <div class="publication-box row">
                            <div class="content-box">
                                <div class="details mb-3">
                                    <div class="left">
                                        <div class="item author"><i class="fa-solid fa-envelope"></i> {{ $oper->email }} </div>
                                        <div class="item comments"><i class="fa-solid fa-phone"></i> {{ $oper->phone }} </div>
                                    </div>
                                </div>
                                <div class="info mb-lg-3">
                                    <h4>{{ $oper->name }}</h4>
                                    <p>{{ $oper->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center mt-4 mb-4">
                        <h3 class="text-secondary">Oops! De momento no hay Operativos clinicos añadidos.</h3>
                    </div>
                    @endforelse
                </div>
                @else
                    <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">Operativos veterinarios</h1>
                    <div class="hline mb-5"></div>
                    <h2 class="text-secondary">Oops! De momento no hay un beneficio asignado, intentelo más tarde.</h2>
                @endif
            </div>
        </div>
    </header>
    @if ($operativos->hasPages())
        <div class="mt-4 mb-5">
            <div class="info-container p-2">
                <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                    <div class="m-2 m-lg-3">
                        {{ $operativos->onEachSide(5)->links() }}
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