@extends('layouts.layout-admin')
@section('title') Administración @endsection
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <div class="tiles">
            <article class="tile">
                <div class="tile-header">
                    <i class="fa-solid fa-folder-open"></i>
                    <h3>
                        <span>Publicaciones</span>
                        <span>Activas</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>{{ $countPublications }}</h3>
                </div>
                <a href="{{ route('admin.publication.index') }}">
                    <span>Ver Más</span>
                    <span class="icon-button">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </a>
            </article>
            <article class="tile">
                <div class="tile-header">
                    <i class="fa-sharp fa-solid fa-shop"></i>
                    <h3>
                        <span>Servicios</span>
                        <span>Activos</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>{{ $countServices }}</h3>
                </div>
                <a href="{{ route('admin.service.index') }}">
                    <span>Ver Más</span>
                    <span class="icon-button">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </a>
            </article>
            <article class="tile">
                <div class="tile-header">
                    <i class="fa-solid fa-user"></i>
                    <h3>
                        <span>Usuarios</span>
                        <span>Activos</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>{{ $countUsers }}</h3>
                </div>
                <a href="{{ route('admin.user.index') }}">
                    <span>Ver Más</span>
                    <span class="icon-button">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </a>
            </article>
        </div>
    </section>
    <section class="lasts-section">
        <div class="lasts-section-header">
            <h2>Últimas solicitudes</h2>
        </div>
        <div class="lasts">
            <div class="lasts">
                <dl class="lasts-details">
                    {{-- @forelse ($solicitudes as $solicitud)
                        <div>
                            <dt>{{ $solicitud->name }}</dt>
                            <dd>{{ $solicitud->description }}</dd>
                        </div>
                    @empty
                        
                    @endforelse --}}
                    {{-- <div>
                        <dt>{{ $serviceRequest }}</dt>
                        <dd>{{ $serviceRequest->description }}</dd>
                    </div>
                    <div>
                        <dt>texto</dt>
                        <dd>Descripcion</dd>
                    </div>
                    <div>
                        <dt>texto</dt>
                        <dd>Descripcion</dd>
                    </div> --}}

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha de solicitud</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr>
                                <th scope="row">{{$solicitud->name}}</th>
                                <td>{{ Str::limit($solicitud->description, 75) }}</td>  
                                <td>{{ $solicitud->created_at }}</td> 
                            </tr>
                        @endforeach
                    </table>
                </dl>
                <div class="lasts-show">
                    <a href="{{ route('admin.association.index') }}">
                        <i class="fa-solid fa-arrow-right-long"></i>
                        <dd>Ver Más</dd>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
