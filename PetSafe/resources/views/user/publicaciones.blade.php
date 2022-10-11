@extends('layouts.layout-user')
    @section('CSS')
        <link rel="stylesheet" href="{{ asset('/css/publicacion.css') }}">
    @endsection
    @section('content')

    <header class="my-5 mb-5">
        <div class="container px-lg-5">
            <div class="p-1 bg-light rounded-3 text-center">
                <div class="m-2 m-lg-3">
                    <div class="search-bar">
                        <div class="select-box" id="select">
                            <div class="search-wrapper">
                                <span id="select-text">Buscar Por</span>
                                <i class="fa-solid fa-caret-down"></i>
                            </div>
                            <ul id="list">
                                <li class="options">Mascotas Perdidas</li>
                                <li class="options">Mascotas Encontradas</li>
                                <li class="options">Mascotas en Adopción</li>
                            </ul>
                        </div>
                        <input type="text" placeholder="Buscar entre las Publicaciones">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5">
        <div class="p-2 p-lg-3 bg-light rounded-3 text-center">
            <div class="m-2 m-lg-3">
                <div class="publications-list">
                    <!--publication item-->
                    <div class="publication-box row">
                        <div class="image-box col-lg-4">
                            <a href="{{ route('detalle') }}"><img src="{{ asset('/images/placeholder-image.jpg') }}" alt=""></a>
                        </div>
                        <div class="content-box col-lg-8">
                            <div class="details mb-3">
                                <div class="left">
                                    <div class="item date"><i class="fa-solid fa-calendar"></i> 10/10/2022</div>
                                    <div class="item author"><i class="fa-solid fa-user"></i> Autor</div>
                                    <div class="item comments"><i class="fa-solid fa-message"></i> 10</div>
                                    <div class="item favs"><i class="fa-solid fa-heart"></i> 5</div>
                                </div>
                                <div class="right">
                                    <div class="add-fav">
                                        <label>
                                            <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                            <i class="fa-regular fa-heart active favorite fav-icon"></i>
                                            <i class="fa-solid fa-heart no-favorite fav-icon"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="info mb-lg-3">
                                <h4>El titulo del post</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sunt animi quo itaque reiciendis cupiditate unde sed veniam ex, aliquid, non, debitis dolor dicta. Vel?</p>
                            </div>
                            <div class="action mb-1 mt-lg-4 mb-lg-4">
                                <a href="{{ route('detalle') }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--publication item-->
                    <div class="publication-box row">
                        <div class="image-box col-lg-4">
                            <a href="{{ route('detalle') }}"><img src="{{ asset('/images/placeholder-image.jpg') }}" alt=""></a>
                        </div>
                        <div class="content-box col-lg-8">
                            <div class="details mb-3">
                                <div class="left">
                                    <div class="item date"><i class="fa-solid fa-calendar"></i> 10/10/2022</div>
                                    <div class="item author"><i class="fa-solid fa-user"></i> Autor</div>
                                    <div class="item comments"><i class="fa-solid fa-message"></i> 10</div>
                                    <div class="item favs"><i class="fa-solid fa-heart"></i> 5</div>
                                </div>
                                <div class="right">
                                    <div class="add-fav">
                                        <label>
                                            <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                            <i class="fa-regular fa-heart active favorite"></i>
                                            <i class="fa-solid fa-heart no-favorite"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="info mb-lg-3">
                                <h4>El titulo del post</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sunt animi quo itaque reiciendis cupiditate unde sed veniam ex, aliquid, non, debitis dolor dicta. Vel?</p>
                            </div>
                            <div class="action mb-1 mt-lg-4 mb-lg-4">
                                <a href="{{ route('detalle') }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--publication item-->
                    <div class="publication-box row">
                        <div class="image-box col-lg-4">
                            <a href="{{ route('detalle') }}"><img src="{{ asset('/images/placeholder-image.jpg') }}" alt=""></a>
                        </div>
                        <div class="content-box col-lg-8">
                            <div class="details mb-3">
                                <div class="left">
                                    <div class="item date"><i class="fa-solid fa-calendar"></i> 10/10/2022</div>
                                    <div class="item author"><i class="fa-solid fa-user"></i> Autor</div>
                                    <div class="item comments"><i class="fa-solid fa-message"></i> 10</div>
                                    <div class="item favs"><i class="fa-solid fa-heart"></i> 5</div>
                                </div>
                                <div class="right">
                                    <div class="add-fav">
                                        <label>
                                            <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                            <i class="fa-regular fa-heart active favorite"></i>
                                            <i class="fa-solid fa-heart no-favorite"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="info mb-lg-3">
                                <h4>El titulo del post</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sunt animi quo itaque reiciendis cupiditate unde sed veniam ex, aliquid, non, debitis dolor dicta. Vel?</p>
                            </div>
                            <div class="action mb-1 mt-lg-4 mb-lg-4">
                                <a href="{{ route('detalle') }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--publication item-->
                    <div class="publication-box row">
                        <div class="image-box col-lg-4">
                            <a href="{{ route('detalle') }}"><img src="{{ asset('/images/placeholder-image.jpg') }}" alt=""></a>
                        </div>
                        <div class="content-box col-lg-8">
                            <div class="details mb-3">
                                <div class="left">
                                    <div class="item date"><i class="fa-solid fa-calendar"></i> 10/10/2022</div>
                                    <div class="item author"><i class="fa-solid fa-user"></i> Autor</div>
                                    <div class="item comments"><i class="fa-solid fa-message"></i> 10</div>
                                    <div class="item favs"><i class="fa-solid fa-heart"></i> 5</div>
                                </div>
                                <div class="right">
                                    <div class="add-fav">
                                        <label>
                                            <input type="checkbox" class="add-favorite-btn" name="" style="display: none;">
                                            <i class="fa-regular fa-heart active favorite"></i>
                                            <i class="fa-solid fa-heart no-favorite"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="info mb-lg-3">
                                <h4>El titulo del post</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sunt animi quo itaque reiciendis cupiditate unde sed veniam ex, aliquid, non, debitis dolor dicta. Vel?</p>
                            </div>
                            <div class="action mb-1 mt-lg-4 mb-lg-4">
                                <a href="{{ route('detalle') }}" class="show-more"> Ver Más <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 mb-5">
        <div class="container px-lg-5">
            <div class="p-1 p-lg-1 bg-light rounded-3 text-center">
                <div class="m-2 m-lg-3">
                   <h4>paginación...</h4>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('JS')
        <script src="{{ asset('/js/publicacion.js') }}"></script>
    @endsection