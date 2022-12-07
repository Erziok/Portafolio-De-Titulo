<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Config::get('petsafe-web-config.pageName') }} | Iniciar Sesión</title>
    <!-- Style sheets -->
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <link href="{{ asset('css/components.css?v=').time() }}" rel="stylesheet" >
    <!-- Bootstrap CDN (CSS only) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <section class="auth-section">
        <div class="container">
          <form action="{{ route('login.create') }}" method="POST" id="form">
            @csrf
            <div class="login-box d-flex justify-content-center align-items-center">
              <div class="col-lg-8 col-xl-6">
                <div class="shadow-box">
                  <div class="p-5">
                    <div class="title-box mb-5">
                      <h3 class="f-size-lg c-text-black">Iniciar Sesión</h3>
                      <div class="hline"></div>
                    </div>
                    <div class="form-outline mb-4">
                      <div class="input-component">
                        <input class="c-text-black" id="mail" type="text" name="email" placeholder="Correo" autocomplete="off">
                        <label for="mail">Correo</label>
                        @error('email')
                          <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
  
                    <div class="form-outline mb-4">
                      <div class="input-component">
                        <input class="c-text-black" id="password" type="password" name="password" placeholder="Contraseña" autocomplete="off">
                        <label for="password">Contraseña</label>
                        @error('password')
                          <small class="mt-2" style="color: darkred">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
  
                    <div class="btn-component mb-2">
                      <button class="btn-default f-size-sm">Iniciar sesión</button>
                    </div>
                    
                    <p class="mt-3 c-text-black">¿No tiene una cuenta? <a href="{{ route('register') }}">Registrarse</a></p>
                    <div class="salida"></div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          
        </div>
      </section>
      @include('sweetalert::alert')
</body>
</html>