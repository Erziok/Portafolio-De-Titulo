<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Config::get('petsafe-web-config.pageName') }} | Registrarse</title>
    <!-- Style sheets -->
    <link href="{{ asset('css/components.css?v=').time() }}" rel="stylesheet" >
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <!-- Bootstrap CDN (CSS only) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <section class="auth-section">
        <div class="container">
          <form action="{{ route('register.create') }}" method="POST" id="form">
            @csrf
            <div class="register-box d-flex justify-content-center align-items-center">
              <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="shadow-box">
                  <div class="p-5">
                    <div class="title-box mb-5">
                      <h3 class="f-size-lg c-text-black">Datos de registro</h3>
                      <div class="hline"></div>
                    </div>
                    <div class="row justify-content-between">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="firstname" type="text" name="firstname" placeholder="Nombre" autocomplete="off">
                          <label for="firstname">Nombre</label>
                          <small class="error-text mt-2"><i class="fa-solid fa-circle-exclamation"></i> Introduce un nombre válido (mínimo 3 carácteres / solo letras)</small>
                          @error('name')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="lastname" type="text" name="lastname" placeholder="Apellido" autocomplete="off">
                          <label for="lastname">Apellido</label>
                          <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i> Introduce un apellido válido (mínimo 3 carácteres / solo letras)</small>
                          @error('lastname')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="mail" type="text" name="email" placeholder="Correo" autocomplete="off">
                          <label for="mail">Correo</label>
                          <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i> Introduce un email válido</small>
                          @error('email')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="run" type="text" name="run" placeholder="Rut" autocomplete="off">
                          <label for="run">Rut</label>
                          <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i> Introduce un rut válido</small>
                          @error('run')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="password" type="password" name="password" placeholder="Contraseña" autocomplete="off">
                          <label for="run">Contraseña</label>
                          <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i> Introduce una contraseña válida (mínimo 6 carácteres)</small>
                          @error('password')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="input-component form-box">
                          <input class="c-text-black" id="password2" type="password" name="password2" placeholder="Repetir Contraseña" autocomplete="off">
                          <label for="password2">Repetir Contraseña</label>
                          <small class="error-text"><i class="fa-solid fa-circle-exclamation"></i> Las contraseñas no coinciden</small>
                          @error('password2')
                            <small class="mt-2" style="color: darkred"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="btn-component mt-4">
                      <button class="btn-default f-size-sm">Registrarse</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      <script src="{{ asset('js/validateregister.js?v=').time() }}"></script>
      <script src="{{ asset('js/validaterut.js?v=').time() }}"></script>
      @include('sweetalert::alert')
</body>
</html>