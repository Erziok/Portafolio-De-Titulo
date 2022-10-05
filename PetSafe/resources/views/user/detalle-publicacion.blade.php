@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/detalle-publicacion.css?v=').time() }}">
@endsection

@section('content')
<div class="publication-section mt-4 mb-4">
    <div class="section-title mb-4 mt-2">
        <h3>Mascota "Categoría"</h3>
        <div class="hline"></div>
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
        <div class="col-lg-6 section-left">
            <div class="comments-section">
                <div class="comment-container comment-left mt-4">
                    <div class="comment-box">
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="comment-container comment-right mt-4">
                    <div class="comment-box">
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="comment-container comment-right mt-4">
                    <div class="comment-box">
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="comment-container comment-left mt-4">
                    <div class="comment-box">
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, placeat.</p>
                        </div>
                    </div>
                </div>
                <div class="comment-container comment-right mt-4">
                    <div class="comment-box">
                        <div class="comment-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, placeat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-message-section text-center mt-3">
                <div class="input-box">
                    <form action="#" method="post">
                        <input type="text" placeholder="Escriba un Comentario...">
                        <button type="submit" title="Enviar"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
    <div class="description-section row mt-3 mb-2">
        <div class="pet-name">
            <h3>Nombre de la Mascota</h3>
        </div>
        <div class="pet-description">
            <ul>
                <li>Característica 1</li>
                <li>Característica 2</li>
                <li>Característica 3</li>
                <li>Característica 4</li>
                <li>Característica 5</li>
                <br>
                <h5>Ultima locación</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum saepe quo adipisci consectetur. Quam deserunt, veniam voluptatem excepturi itaque cumque.</p>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('JS')
<script src="{{ asset('js/detalle-publicacion.js?v=').time() }}"></script>
@endsection