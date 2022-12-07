@extends('layouts.layout-user')
@section('title') Mi Perfil @endsection
@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/perfil.css?v=').time() }}">
    <script src="{{ asset('js/scrollreveal.js') }}"></script>  
@endsection

@section('content')

<div class="container-profile">
    @if (isset($mensajeRevision))
        <div class="alert alert-warning alert-dismissible fade show mt-4 mb-1" role="alert">
            <strong>Atención.</strong> <?php echo $mensajeRevision ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (isset($mensajeRechazo))
        <div class="alert alert-danger alert-dismissible fade show mt-4 mb-1" role="alert">
            <strong>Atención.</strong> <?php echo $mensajeRechazo ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="profile-avatar-box">
                @if ($datos[0]->avatar == null)
                    <div class="avatar-box">
                        <img src="{{ asset('images/placeholder-user.jpg') }}" alt="...">
                    </div>
                @else
                    <div class="avatar-box">
                        <img src="{{ asset($datos[0]->avatar) }}" alt="...">
                    </div>
                @endif
                {{-- Change avatar form --}}
                <form action="{{ route('cambiar-avatar.update') }}" method="POST" id="avatar-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="btn-component mt-3 mb-3">
                        <div class="btn-wrapper">
                            <button class="btn-action" id="btn-change-avatar">Cambiar avatar</button>
                            <span><i class="fa-solid fa-camera-rotate"></i></span>
                        </div>
                    </div>
                    <input type="file" class="form-control d-none" id="customFile2" name="avatar"/>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="shadow-box d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 perfil-item-x2-d1">
                <h3 class="c-text-black mb-0">{{$datos[0]->firstname}} {{$datos[0]->lastname}}</h3>
                <span class="c-text-black">Usuario {{$datos[0]->role->role}}</span>
            </div>
            <ul class="shadow-box list-unstyled py-1-9 px-1-9 px-sm-6 mb-1-9 perfil-item-x2-d2">
                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 c-text-black f-size-md">Run:</span> {{$datos[0]->run}}</li>
                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 c-text-black f-size-md">Email:</span> {{$datos[0]->email}}</li>
                <a href="{{ route('editar-usuario') }}" class="btn-simple-component mr-3" role="button">Editar perfil</a>
                <a href="{{ route('cambiar-contraseña') }}" class="btn-simple-component" role="button">Cambiar contraseña</a>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-5 mb-5">
                <span class="section-title c-text-black">Información adicional</span>
                <div class="hline mb-4"></div>
                <div class="d-flex flex-wrap justify-content-start">
                    <div class="profile-info-item perfil-item-x1-d1">
                        <h5 class="card-title">Publicaciones</h5>
                        <h6 class="card-subtitle mb-2 text-muted mb-3">{{$datos[0]->publication_count}} realizadas</h6>
                        @if (($datos[0]->publication_count) != 0)
                            <a href="{{ route('mis-publicaciones')}}" class="btn-simple-component">Ver Detalle</a>
                        @else
                            <button class="btn-simple-disable-component" role="button">Ver Detalle</button>
                        @endif
                        <a href="{{ route('formulario-mascota') }}" class="btn-simple-component" role="button">Crear publicación</a>
                    </div>
                    <div class="profile-info-item perfil-item-x1-d2">
                        <h5 class="card-title">Favoritos</h5>
                        <h6 class="card-subtitle mb-2 text-muted mb-3">{{$datos[0]->favourite_count}} guardadas</h6>
                        @if (($datos[0]->favourite_count) != 0)
                        <a href="{{ route('mis-favoritos')}}" class="btn-simple-component">Ver Detalle</a>
                        @else
                        <button class="btn-simple-disable-component">Ver Detalle</button>
                        @endif
                    </div>
                    <div class="profile-info-item perfil-item-x1-d3">
                        <h5 class="card-title">Servicios</h5>
                        <h6 class="card-subtitle mb-2 text-muted mb-3">{{$datos[0]->service_count}} publicados</h6>
                        @if (($datos[0]->service_count) != 0)
                            <a href="{{ route('mis-servicios')}}" class="btn-simple-component">Ver Detalle</a>
                        @else
                            <button class="btn-simple-disable-component">Ver Detalle</button>
                        @endif
                        @if (isset($mensajeRevision))
                            <button class="btn-simple-disable-component">Publicar servicio</button>
                        @else
                            <a href="{{ route('formulario-servicio') }}" class="btn-simple-component">Publicar servicio</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('JS')
    <script src="{{ asset('js/change-avatar.js') }}"></script>
    <script src="{{ asset('js/components.js') }}"></script>
@endsection