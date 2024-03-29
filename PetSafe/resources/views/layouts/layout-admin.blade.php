<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="base-url" content="{{ url('') }}">
    <title>{{ Config::get('petsafe-web-config.pageName') }} | @yield('title')</title>
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href=" {{ asset('css/admin.css?v='.time()) }} ">
    <link rel="stylesheet" href="{{ asset('css/components.css?v=').time() }}" >
    @yield('CSS')
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="" />
                    </span>
                    <h1 class="logo-title">
                        <span>PetSafe</span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                    <a href="{{ route('admin.home') }}" class="{{ Request::is('admin') ? 'active' : '' }}">
                        Metricas
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </div>
            </div>
            <div class="app-header-actions">
                <a href="{{ route('perfil') }}" class="user-profile">
                    <span>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                    <span>
                        @if (Auth::user()->avatar == null)
                            <img src="{{ asset('images/placeholder-user.jpg') }}" alt="...">
                        @else  
                            <img src="{{ asset(Auth::user()->avatar) }}" alt="...">
                        @endif
                    </span>
                </a>
                <div class="app-header-actions-buttons">
                    <button class="icon-button large">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                </div>
            </div>
            <div class="app-header-mobile">
                <button class="icon-button large">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

        </header>
        <div class="app-body">
            <div class="app-body-navigation">
                <nav class="navigation">
                    <a href="{{ route('admin.user.index') }}" class="{{ Request::is('admin/user') ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Usuarios</span>
                    </a>
                    <a href="{{ route('admin.publication.index') }}" class="{{ Request::is('admin/publication') ? 'active' : '' }}">
                        <i class="fa-solid fa-folder-open"></i>
                        <span>Publicaciones</span>
                    </a>
                    <a href="{{ route('admin.service.index') }}" class="{{ Request::is('admin/service') ? 'active' : '' }}">
                        <i class="fa-solid fa-shop"></i>
                        <span>Servicios</span>
                    </a>
                    <a href="{{ route('admin.clinicalProcedure.index') }}" class="{{ Request::is('admin/clinicalProcedure') ? 'active' : '' }}">
                        <i class="fa-solid fa-stethoscope"></i>
                        <span>Veterinaria</span>
                    </a>
                    <a href="{{ route('admin.medicine.index') }}" class="{{ Request::is('admin/medicine') ? 'active' : '' }}">
                        <i class="fa-solid fa-flask"></i>
                        <span>Farmacia</span>
                    </a>
                    <a href="{{ route('admin.course.index') }}" class="{{ Request::is('admin/course') ? 'active' : '' }}">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Cursos</span>
                    </a>
                    <a href="{{ route('admin.benefit.index') }}" class="{{ Request::is('admin/benefit') ? 'active' : '' }}">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <span>Beneficios</span>
                    </a>
                    
                    <a href="{{ route('admin.canineArea.index') }}" class="{{ Request::is('admin/canineArea') ? 'active' : '' }}">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <span>Zonas</span>
                    </a>
                    <a href="{{ route('admin.web.index') }}" class="{{ Request::is('admin/web') ? 'active' : '' }}">
                        <i class="fa-solid fa-earth-americas"></i>
                        <span>Web</span>
                    </a>
                    <a href="{{ route('admin.association.index') }}" class="{{ Request::is('admin/associations/requests') ? 'active' : '' }}">
                        <i class="fa-solid fa-handshake"></i>
                        <span>Solicitudes</span>
                    </a>
                    <br>
                </nav>
                <footer class="footer">
                    <div class="navigation border-0">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-globe"></i>
                            <span>Ir a PetSafe</span>
                        </a>
                    </div>
                    <br>
                    <h1>PetSafe<small>©</small></h1>
                    <div>
                        PetSafe ©<br />
                        Derechos reservados 2022
                    </div>
                </footer>
            </div>
            @yield('content')
        </div>
    </div>
    @yield('JS')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b98e68faf3.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js?v='.time()) }}"></script>
    @include('sweetalert::alert')
</body>
</html>
