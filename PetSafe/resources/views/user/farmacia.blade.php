<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmacia Municipal</title>
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <!-- Bootstrap CDN (CSS only) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg">

        <!-- Principal Div -->
        <div class="container-fluid">

            <!-- Menu Div -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Menú
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a></li>
                  <li><a class="dropdown-item" href="{{ route('register') }}">Registrarse</a></li>
                  <div class="dropdown-divider"></div>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            
            <!-- PetSafe Logo -->
            <div class="">
                <a class="" href=""><img src="" class="logo-brand" alt=""></a>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->

            <!-- Other options (right)-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" /></a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Farmacia municipal</h1>
                    <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                    <a class="btn btn-primary btn-lg" href="#!">Call to action</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; PetSafe 2022</p></div>
    </footer>
    
</body>
</html>