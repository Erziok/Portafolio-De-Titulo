@extends('layouts.layout-user')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/perfil.css?v=').time() }}">
@endsection

@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
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
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Información adicional</span>
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                          <h5 class="card-title">Publicaciones</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$datos[0]->publication_count}} realizadas</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          @if (($datos[0]->favourite_count) != 0)
                            <a href="{{ route('mis-favoritos')}}" class="btn favourites-btn btn-sm" role="button" aria-disabled="true">Ver favoritos</a>
                          @else
                            <a href="#" class="btn favourites-btn btn-sm disabled" role="button" aria-disabled="true">Ver favoritos</a>
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