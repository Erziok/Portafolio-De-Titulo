<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="base-url" content="{{ url('') }}">
    <title>{{ Config::get('petsafe-web-config.pageName') }} | @yield('title')</title>
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <link href="{{ asset('css/main.css?v=').time() }}" rel="stylesheet" >
    <link href="{{ asset('css/preloader.css?v=').time() }}" rel="stylesheet" >
    <link href="{{ asset('css/components.css?v=').time() }}" rel="stylesheet" >

    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Roboto --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    {{-- Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    @yield('CSS')
</head>
<body class="hidden">

    <div class="center" id="preloader">
        <div class="preloader-content">
            <div class="">
                <img src="{{ asset('images/preloader_logo.png') }}" alt="" srcset="" class="preloader-logo">
            </div>

            <div class="lds-dual-ring center"></div>
        </div>
                       
    </div>
    
    <div class="header" style="background-image: url({{ url('images/degradeTransparencia-300x7.png') }})">
        <div class="header-content">
            <div class="header-item"><a href="http://192.168.1.10/San_Bernardo_Autoconsulta/WebLogin.aspx"><img src="{{ asset('images/BTN_autoconsulta.png') }}" alt=""></a></div>
            <div class="header-item"><a href="https://www.corsaber.cl/"><img src="{{ asset('images/CORSABER_T-1.png') }}" alt=""></a></div>
            <div class="header-item"><a href="https://correo.sanbernardo.cl/webmail/login/"><img src="{{ asset('images/Mail1.png') }}" alt=""></a></div>
            <div class="header-item"><a href="https://www.leylobby.gob.cl/solicitud/audiencia/689"><img src="{{ asset('images/LeyLobby_T-1.png') }}" alt=""></a></div>
            <div class="header-item"><a href="https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU281"><img src="{{ asset('images/LeyTransparencia_T-1.png') }}" alt=""></a></div>
            <div class="header-item"><a href="https://www.portaltransparencia.cl/PortalPdT/web/guest/directorio-de-organismos-regulados?p_p_id=pdtorganismos_WAR_pdtorganismosportlet&orgcode=1245439882540ca5f4c1ab535c6a9a8e"><img src="{{ asset('images/SolicitudInformacion_T-1.png') }}" alt=""></a></div>
        </div>
      </div>

    <section class="navbar-section">
        <div class="navbar">
            <div class="navbar-content">
                <div class="mobile-menu" id="mobile-menu"><i class="fa-solid fa-bars"></i></div>
                <div class="logo-box">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo_2.png') }}" alt="" srcset="">
                    </a>
                </div>
                <div class="links-container links-container-disable" id="links-container">
                    <div class="navbar-link">
                        <div class="navbar-item">Trámites <i class="fa-solid fa-chevron-down chevron-link"></i></div>
                        <div class="dropdown">
                            <ul>
                                <li><a href="https://www.sanbernardo.cl/web/descargas/formularios-descarga/2019-08-DESCARGOS-DEL-TAG.pdf"
                                    target="_blank">Descargos Tag</a></li>
                                <li><a href="https://pago.smc.cl/pagoPCVv2/Login.aspx?ReturnUrl=%2fpagoPCVv2%2fSistema%2fPrincipal.aspx"
                                    target="_blank">Permisos de Circulación</a></li>
                                <li><a href="https://pago.smc.cl/pagoPCv2/Login.aspx?ReturnUrl=%2fpagoPCv2%2fSistema%2fPrincipal.aspx"
                                    target="_blank">Patentes Comerciales</a></li>
                                <li><a href="http://appl.smc.cl/PagoVARIOS/Login.aspx?ReturnUrl=%2fpagovarios%2fSistema%2fPrincipal.aspx"
                                    target="_blank">Obras</a></li>
                                <li><a href="https://pago.smc.cl/pagoAseov2/Login.aspx?ReturnUrl=%2fpagoaseov2%2fSistema%2fPrincipal.aspx"
                                    target="_blank">Derechos de Aseo</a></li>
                                <li><a href="https://www.sanbernardo.cl/otros-tramites/">Pagos y Trámites Online</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-link">
                        <div class="navbar-item">Temáticas Ciudadanas <i class="fa-solid fa-chevron-down chevron-link"></i></div>
                        <div class="dropdown dropdown-tematicas">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <ul>
                                        <li><a href="https://www.sanbernardo.cl/direccion-seguridad-ciudadana/">
                                            Seguridad Ciudadana</a></li>
                                        <li><a href="https://www.sanbernardo.cl/mujer-y-equidad-de-genero/">
                                            Mujer y Equidad de Género</a></li>
                                        <li><a href="https://www.sanbernardo.cl/tenencia-responsable-de-mascotas/">
                                            Mascotas</a></li>
                                        <li><a href="https://www.sanbernardo.cl/personas-mayores/">
                                            Personas Mayores</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <ul>
                                        <li><a href="https://www.sanbernardo.cl/pueblos-originarios/">
                                            Pueblos Originarios</a></li>
                                        <li><a href="https://www.sanbernardo.cl/infancia-y-adolescencia/">
                                            Infancia y Adolescencia</a></li>
                                        <li><a href="https://www.sanbernardo.cl/medio-ambiente/">
                                            Medioambiente</a></li>
                                        <li><a href="https://www.sanbernardo.cl/cultura-y-turismo/">
                                            Cultura y Turismo</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <ul>
                                        <li><a href="https://www.sanbernardo.cl/migrantes/">
                                            Migrantes</a></li>
                                        <li><a href="https://www.sanbernardo.cl/deporte/">
                                            Deporte</a></li>
                                        <li><a href="https://www.sanbernardo.cl/derechos-humanos/">
                                            Derechos Humanos</a></li>
                                        <li><a href="https://www.sanbernardo.cl/diversidad-y-no-discriminacion/">
                                            Diversidad y No Discriminación</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <ul>
                                        <li><a href="https://www.sanbernardo.cl/dirigencia-social/">
                                            Dirigencia Social</a></li>
                                        <li><a href="https://www.sanbernardo.cl/juventud/">
                                            Juventud</a></li>
                                        <li><a href="https://www.sanbernardo.cl/discapacidad/">
                                            Discapacidad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="navbar-link">
                        <div class="navbar-item">Conoce tu Municipio <i class="fa-solid fa-chevron-down chevron-link"></i></div>
                        <div class="dropdown">
                            <ul>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio/">
                                    Misión y Visión</a></li>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio-organigrama/">
                                    Organigrama</a></li>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio-alcalde/">
                                    Alcalde</a></li>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio-concejo-municipal/">
                                    Concejo Municipal</a></li>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio-cosoc/">
                                    COSOC</a></li>
                                <li><a href="https://www.sanbernardo.cl/conoce-tu-municipio-direcciones-municipales/">
                                    Direcciones Municipales</a></li>
                                <li><a href="https://www.sanbernardo.cl/ordenanzas-y-decretos/">
                                    Ordenanzas y Decretos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-link">
                        <div class="navbar-item">Departamento Social <i class="fa-solid fa-chevron-down chevron-link"></i></div>
                        <div class="dropdown">
                            <ul>
                                <li><a href="https://www.sanbernardo.cl/trabajo-social/">
                                    Trabajo Social</a></li>
                                <li><a href="https://www.sanbernardo.cl/trabajo-social/registro-social-de-hogares/">
                                    Registro Social de Hogares</a></li>
                                <li><a href="https://www.sanbernardo.cl/trabajo-social/subsidios/">
                                    Subsidios</a></li>
                                <li><a href="https://www.sanbernardo.cl/trabajo-social/prevencion-del-consumo-de-alcohol-y-drogas/">
                                    Prevención del Consumo de <br> Alcohol y Drogas</a>
                                </li>
                                <li><a href="https://www.sanbernardo.cl/trabajo-social/exencion-de-aseo/">
                                    Exención de Aseo</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-link">
                        <div class="navbar-item">Noticias <i class="fa-solid fa-chevron-down chevron-link"></i></div>
                        <div class="dropdown">
                            <ul>
                                <li><a href="https://www.sanbernardo.cl/category/noticias">
                                    Últimas Noticias</a></li>
                                <li><a href="https://www.youtube.com/playlist?list=PLxCh8JFNVpwq5X3j09Ji2pC-HcNJKt8IN"
                                    target="_blank">Noticiero</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-link">
                        <div class="navbar-item">Atención vecinal</div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://datos.gob.cl/organization/municipalidad_de_san_bernardo">
                            MUNICIPALIDAD</a></div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://www.corsaber.cl/">
                            CORSABER</a></div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://correo.sanbernardo.cl/webmail/login/">
                            INTRANET</a></div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://www.leylobby.gob.cl/solicitud/audiencia/689">
                            PLATAFORMA LEY LOBBY</a></div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU281">
                            LEY DE TRANSPARENCIA</a></div>
                    </div>
                    <div class="header-link">
                        <div class="header-item"><a href="https://www.portaltransparencia.cl/PortalPdT/web/guest/directorio-de-organismos-regulados?p_p_id=pdtorganismos_WAR_pdtorganismosportlet&orgcode=1245439882540ca5f4c1ab535c6a9a8e">
                            SOLICITUD DE INFORMACIÓN</a></div>
                    </div>
                </div>
                <div class="user-action-box">
                    <div class="search-box">
                        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="user-box">
                        <span><i class="fa-sharp fa-solid fa-user"></i></span>
                    </div>
                    <div class="dropdown-user">
                        <ul>    
                            @if (auth()->user())
                                <li><a href="{{ route('perfil') }}">Mi Perfil</a></li>
                                @if (auth()->user()->role_id == 1)
                                    <li><a href="{{ route('admin.home') }}">Administración</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                                <li><a href="{{ route('register') }}">Registrarse</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <a class="credits" href="{{ route('creditos') }}">PetSafe 2022</a></p></div>
    </footer>
    @yield('JS')
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/preloader.js') }}"></script>
    <!--JS Bootstrap (primero popper y luego boostrap)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b98e68faf3.js" crossorigin="anonymous"></script>
    @include('sweetalert::alert')
</body>
</html>