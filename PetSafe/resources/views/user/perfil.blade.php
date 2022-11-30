@extends('layouts.layout-user')
@section('title') Mi Perfil @endsection
@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/perfil.css?v=').time() }}">
@endsection

@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    @if (isset($mensajeRevision))
                        <div class="alert alert-warning alert-dismissible fade show mt-4 mb-1" role="alert">
                            <strong>Atención.</strong> <?php echo $mensajeRevision ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (isset($mensajeRechazo))
                        <div class="alert alert-warning alert-dismissible fade show mt-4 mb-1" role="alert">
                            <strong>Atención.</strong> <?php echo $mensajeRechazo ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                @if ($datos[0]->avatar == null)
                                    <div class="image-box">
                                        <img src="{{ asset('images/placeholder-user.jpg') }}" alt="...">
                                    </div>
                                @else
                                    <div class="image-box">
                                        <img src="{{ asset($datos[0]->avatar) }}" alt="...">
                                    </div>
                                @endif
                                {{-- Change avatar form --}}
                                <form action="{{ route('cambiar-avatar.update') }}" method="POST" id="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex justify-content-center change-avatar">
                                        <div class="btn btn-rounded change-avatar-btn">
                                            <label class="form-label text-white m-1" for="customFile2">Cambiar avatar</label>
                                            <input type="file" class="form-control d-none" id="customFile2" name="avatar"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">{{$datos[0]->firstname}} {{$datos[0]->lastname}}</h3>
                                    <span class="text-primary">Usuario {{$datos[0]->role->role}}</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Run:</span> {{$datos[0]->run}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$datos[0]->email}}</li>
                                    <a href="{{ route('editar-usuario') }}" class="btn edit-profile-btn btn-lg" role="button">Editar perfil</a>
                                    <a href="{{ route('cambiar-contraseña') }}" class="btn btn-secondary btn-lg" role="button">Cambiar contraseña</a>
                                    {{--
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.example.com</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>
                                    --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="row">
                    <span class="section-title text-primary mb-3 mb-sm-4">Información adicional</span>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                          <h5 class="card-title">Publicaciones</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$datos[0]->publication_count}} realizadas</h6>
                          @if (($datos[0]->publication_count) != 0)
                            <a href="{{ route('mis-publicaciones')}}" class="btn publications-btn btn-sm" role="button" aria-disabled="true">Ver publicaciones</a>
                          @else
                            <a href="#" class="btn publications-btn btn-sm disabled" role="button" aria-disabled="true">Ver publicaciones</a>
                          @endif
                          <a href="{{ route('formulario-mascota') }}" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">Crear publicación</a>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                          <h5 class="card-title">Favoritos</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$datos[0]->favourite_count}} guardadas</h6>
                          @if (($datos[0]->favourite_count) != 0)
                            <a href="{{ route('mis-favoritos')}}" class="btn favourites-btn btn-sm" role="button" aria-disabled="true">Ver favoritos</a>
                          @else
                            <a href="#" class="btn favourites-btn btn-sm disabled" role="button" aria-disabled="true">Ver favoritos</a>
                          @endif
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                          <h5 class="card-title">Servicios</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$datos[0]->service_count}} publicados</h6>
                          @if (($datos[0]->service_count) != 0)
                            <a href="{{ route('mis-servicios')}}" class="btn favourites-btn btn-sm" role="button" aria-disabled="true">Ver Servicios</a>
                          @else
                            <a href="#" class="btn favourites-btn btn-sm disabled" role="button" aria-disabled="true">Ver Servicios</a>
                          @endif
                          @if (isset($mensajeRevision))
                            <a href="#" class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true">Publicar servicio</a>
                          @else
                            <a href="{{ route('formulario-servicio') }}" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">Publicar servicio</a>
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('JS')
<script src="{{ asset('js/change-avatar.js') }}"></script>
@endsection