@extends('layouts.layout-admin')
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <div class="tiles">
            <article class="tile">
                <div class="tile-header">
                    <i class="fa-solid fa-folder-open"></i>
                    <h3>
                        <span>Publicaciones</span>
                        <span>Cuenta Activas.</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>12</h3>
                </div>
                <a href="#">
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
                        <span>Cuenta Activos</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>12</h3>
                </div>
                <a href="#">
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
                        <span>Cuentas activas</span>
                    </h3>
                </div>
                <div class="quantity">
                    <h3>12</h3>
                </div>
                <a href="#">
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
                    <div>
                        <dt>texto</dt>
                        <dd>Descripcion</dd>
                    </div>
                    <div>
                        <dt>texto</dt>
                        <dd>Descripcion</dd>
                    </div>
                    <div>
                        <dt>texto</dt>
                        <dd>Descripcion</dd>
                    </div>
                </dl>
                <div class="lasts-show">
                    <a href="">
                        <i class="fa-solid fa-arrow-right-long"></i>
                        <dd>Ver Más</dd>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection