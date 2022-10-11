@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection

@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 bg-light rounded-3">
        <div class="m-2 m-lg-3 publication-section py-3">
            <div class="section-title mb-5 mt-2">
                <h3>Mascota "Categoría"</h3>
                <div class="hline"></div>
            </div>
            <div class="publicacion-realizada">
                <div class="usuario-publico">
                    <div class="avatar">
                        <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                    </div>
                    <div class="contenido-publicacion">
                        <h4>Esteban Hernandez</h4>
                        <ul>
                            <li>Hace 3 min</li>
                        </ul>
                    </div>
                    <div class="menu-comentario">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                        <ul class="menu">
                            <li><a href="">Editar</a></li>
                            <li><a href="">Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 section-right">
                    <div class = "pet-imgs">
                        <div class = "img-display">
                            <div class = "img-showcase">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                            </div>
                        </div>
                        <div class = "img-select">
                            <div class = "img-item">
                                <a href = "#" data-id = "1">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                </a>
                            </div>
                            <div class = "img-item">
                                <a href = "#" data-id = "2">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                </a>
                            </div>
                            <div class = "img-item">
                                <a href = "#" data-id = "3">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                </a>
                            </div>
                            <div class = "img-item">
                                <a href = "#" data-id = "4">
                                <img src = "{{ asset('images/placeholder-image.jpg') }}" alt = "shoe image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-section col-lg-4">
                    <div class="pet-name">
                        <h3>Nombre de la Mascota</h3>
                    </div>
                    <div class="pet-description" id="pet-description">
                        <ul>
                            <li>Característica 1</li>
                            <li>Característica 2</li>
                            <li>Característica 3</li>
                            <li>Característica 4</li>
                            <li>Característica 5</li>
                            <br>
                            <h5>Ultima locación</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum saepe quo adipisci consectetur. Quam deserunt, veniam voluptatem excepturi itaque cumque.</p>
                            <li>Característica 1</li>
                            <li>Característica 2</li>
                            <li>Característica 3</li>
                            <li>Característica 4</li>
                            <li>Característica 3</li>
                            <li>Característica 4</li>
                            <li>Característica 3</li>
                            <li>Característica 4</li>
                        </ul>
                    </div>
                    <div class="show-more-box">
                        <button class="" id="show-more">Mostrar Más <i class="fa-solid fa-chevron-down"></i></button>
                    </div>
                </div>
            </div>
            <div class="contenedor-comentarios mt-5">
                <div class="comentarios-usuarios">
                    <!-- comentario principal -->
                    <div class="comentario-principal-usuario">
                        <div class="avatar">
                            <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                        </div>
                        <div class="comentario">
                            <div class="usuario-comentario">
                                <div class="texto">
                                    <a href="#" title="" class="nombre-usuario">Camila valle</a> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla tenetur necessitatibus, error debitis provident obcaecati blanditiis incidunt amet suscipit libero praesentium ducimus omnis harum commodi nobis modi perspiciatis? Quia, facilis.
                                    <div class="menu-comentario">
                                        <i class="fas fa-pen"></i>
                                        <ul class="menu">
                                            <li><a href="">Editar</a></li>
                                            <li><a href="">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="botones-comentario">
                                    <button type="" class="boton-responder">
                                        <i class="fa-solid fa-reply"></i> responder
                                    </button>
                                    <span class="tiempo-comentario">
                                        hece 3 min
                                    </span>
                                </div>
                            </div>
            
                            <!-- contenedor sub comentarios -->
                            <div class="contenedor-sub-comentarios">
                                <!-- sub-comentario uno -->
                                <div class="comentario-principal-usuario">
                                    <div class="avatar">
                                        <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                                    </div>
                                    <div class="comentario">
                                        <div class="usuario-comentario">
                                            <div class="texto">
                                                <a href="#" title="" class="nombre-usuario">Esteban Hernandez</a> <span>Autor</span> Lorem ipsum dolor sit amet adipisicing elit, sed do eiusmod
                                                <div class="menu-comentario">
                                                    <i class="fas fa-pen"></i>
                                                    <ul class="menu">
                                                        <li><a href="">Editar</a></li>
                                                        <li><a href="">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="botones-comentario">
                                                <button type="" class="boton-responder">
                                                    <i class="fa-solid fa-reply"></i> responder
                                                </button>
                                                <span class="tiempo-comentario">
                                                    hece 3 min
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                        </div>
            
                    </div>
            
                    <div class="comentar-publicacion mt-3">
                        <div class="avatar">
                            <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                        </div>
                        <form action="#" method="post" class="comentar-comentario">
                            <input type="text" name="" value="" placeholder="">
                            <button type="" class="boton-enviar">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('JS')
<script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script>
@endsection