<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <!-- Style sheets -->
    <link href="{{ asset('css/styles.css?v=').time() }}" rel="stylesheet" >
    <!-- Bootstrap CDN (CSS only) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
          <form action="{{ route('register.create') }}" method="POST" id="form">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3" style="background-color: #f0f0f0;">
                  <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                    class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                    alt="Sample photo"> -->
                  <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Datos de registro</h3>
        
        
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="firstname" class="form-control" placeholder="Nombre" name="firstname"/>
                        <small class="error-text">Introduce un nombre válido (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Apellido</label>
                        <input type="text" id="lastname" class="form-control" placeholder="Apellido" name="lastname"/>
                        <small class="error-text">Introduce un apellido válido (mínimo 3 carácteres / solo letras)</small>
                        @error('lastname')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Correo electrónico</label>
                        <input type="text" id="mail" class="form-control" placeholder="EJ: ejemplo@gmail.com" name="email"/>
                        <small class="error-text">Introduce un email válido</small>
                        @error('email')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Run</label>
                        <input type="text" id="run" class="form-control" placeholder="EJ: 19844544-4" name="run"/>
                        <small class="error-text">Introduce un rut válido</small>
                        @error('rut')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Contraseña</label>
                        <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password"/>
                        <small class="error-text">Introduce una contraseña válida (mínimo 6 carácteres)</small>
                        @error('password')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
    
                      <div class="form-outline mb-2 form-box">
                        <label class="form-label" for="form3Example1q">Repita su contraseña</label>
                        <input type="password" id="password2" class="form-control" placeholder="Repita su contraseña"/ name="password2">
                        <small class="error-text">Las contraseñas no coinciden</small>
                        @error('password2')
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
          
                      {{-- <button type="submit" class="btn btn-primary" id="submit-btn" >Registrarse</button> --}}
                      <button type="submit" class="register-btn" id="submit-btn">Registrarse</button>
                      <p class="warnings" id="warnings"></p>
                      <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
        
                    <div class="salida"></div>
        
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>

      <script src="{{ asset('js/validateregister.js?v=').time() }}"></script>
      <script src="{{ asset('js/validaterut.js?v=').time() }}"></script>
    
</body>
</html>