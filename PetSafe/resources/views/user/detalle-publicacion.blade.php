@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection

@section('content')
<div class="container px-lg-5 my-5">
    <div class="p-1 bg-light rounded-3">
        <div class="m-2 m-lg-3 publication-section py-3">
            @foreach ($objects as $object)
            <div class="header-publication">
                <div class="section-title mb-5 mt-2">    
                    <h3>{{ $object->title }}</h3>
                    <div class="hline"></div>
                </div>
                @can('publication.user-tasks', $object)
                <div class="menu-publicacion">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                    <ul class="menu">
                        <li><a href="">Editar</a></li>
                        <li><a href="">Eliminar</a></li>
                    </ul>
                </div>
                @endcan
            </div>
            <div class="publicacion-realizada">
                <div class="usuario-publico">
                    <div class="avatar">
                        @if (empty($object->user->avatar))
                            <img src="{{ asset('images/placeholder-user.jpg') }}" alt="img">
                        @else
                            <img src="{{ asset($object->user->avatar) }}" alt="img">
                        @endif
                    </div>
                    <div class="contenido-publicacion">
                        <h4>{{ $object->user->firstname.' '.$object->user->lastname }}</h4>
                        <ul>
                            <li>{{ $object->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 section-right">
                    <div class = "pet-imgs">
                        <div class = "img-display">
                            <div class = "img-showcase">
                                <img src = "{{ asset($object->photo) }}" alt = "shoe image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-section col-lg-4">
                    <div class="pet-name">
                        <h3>{{ $object->animal->name }}</h3>
                    </div>
                    <div class="pet-description" id="pet-description">
                        {{ $object->description }}
                    </div>
                    <div class="show-more-box">
                        <button class="" id="show-more">Mostrar Más <i class="fa-solid fa-chevron-down"></i></button>
                    </div>
                </div>
            </div>
            <div class="contenedor-comentarios mt-5">
                <div class="comentarios-usuarios">
                    @forelse ($object->comment->whereNull('comment_id') as $comment)
                    <div class="comentario-principal-usuario">
                        <div class="avatar">
                            @if (empty($comment->user->avatar))
                                <img src="{{ asset('images/placeholder-user.jpg') }}" alt="img">
                            @else
                                <img src="{{ asset($comment->user->avatar) }}" alt="img">
                            @endif
                        </div>
                        <div class="comentario">
                            <div class="usuario-comentario">
                                <div class="texto">
                                    <a href="#" title="" class="nombre-usuario">{{ $comment->user->firstname }}</a>
                                    @if($comment->user->id == $object->user->id)
                                    <span>Autor</span>
                                    @endif
                                    {{ $comment->comment }}
                                </div>
                                <div class="botones-comentario">
                                    <button type="button" class="btn-reply">
                                        <i class="fa-solid fa-reply"></i> responder
                                    </button>
                                    <span class="tiempo-comentario">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="contenedor-sub-comentarios">
                                    @forelse ($comment->child as $reply)
                                        <!-- sub-comentario -->
                                        <div class="comentario-principal-usuario mt-2">
                                            <div class="avatar">
                                                @if (empty($reply->user->avatar))
                                                    <img src="{{ asset('images/placeholder-user.jpg') }}" alt="img">
                                                @else
                                                    <img src="{{ asset($reply->user->avatar) }}" alt="img">
                                                @endif
                                            </div>
                                            <div class="comentario">
                                                <div class="usuario-comentario">
                                                    <div class="texto">
                                                        <a href="#" title="" class="nombre-usuario">{{ $reply->user->firstname }}</a>
                                                        @if($reply->user->id == $object->user->id)
                                                        <span>Autor</span>
                                                        @endif
                                                        {{ $reply->comment }}
                                                    </div>
                                                    <div class="botones-comentario">
                                                        <span class="tiempo-comentario">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>

                                <!--Seccion de responder-->
                                <div class="reply-box">
                                    <small class="reply-header">Respondiendo a <b>{{$comment->user->firstname}}</b></small>
                                    <div class="comentar-publicacion responder-comentario mt-3">
                                        @if (auth()->check())
                                            <div class="avatar">
                                                <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                                            </div>
                                            <form action="{{ route('detalle.responder', ['object'=> $object, 'comment'=> $comment]) }}" method="post" class="comentar-comentario">
                                                @csrf
                                                <input type="text" name="comment" placeholder="">
                                                <button type="submit" class="boton-enviar">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No hay comentarios en esta publicación</p>
                    @endforelse

                    <div class="comentar-publicacion mt-3">
                        @if (auth()->check())
                            <div class="avatar">
                                <img src="{{ asset('images/placeholder-image.jpg') }}" alt="img">
                            </div>
                            <form action="{{ route('detalle.comentar', $object) }}" method="post" class="comentar-comentario">
                                @csrf
                                <input type="text" name="comment" placeholder="">
                                <button type="submit" class="boton-enviar">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection

@section('JS')
<script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script>
@endsection