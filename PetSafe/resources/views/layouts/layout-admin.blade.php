<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Admin | PetSafe</title>
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href=" {{ asset('css/admin.css?v='.time()) }} ">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                <button class="user-profile">
                    <span>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                    <span>
                        <img src="https://assets.codepen.io/285131/almeria-avatar.jpeg" />
                    </span>
                </button>
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
                    <a href="{{ route('admin.veterinary.index') }}" class="{{ Request::is('admin/veterinary') ? 'active' : '' }}">
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
                    <a href="{{ route('admin.benefit.index') }}" class="{{ Request::is('admin/beneficio') ? 'active' : '' }}">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <span>Beneficios</span>
                    </a>
                    
                    <a href="{{ route('admin.zone.index') }}" class="{{ Request::is('admin/zone') ? 'active' : '' }}">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <span>Zonas</span>
                    </a>
                    <a href="{{ route('admin.web.index') }}" class="{{ Request::is('admin/web') ? 'active' : '' }}">
                        <i class="fa-solid fa-earth-americas"></i>
                        <span>Web</span>
                    </a>
                </nav>
                <footer class="footer"><br>
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
</body>
</html>
