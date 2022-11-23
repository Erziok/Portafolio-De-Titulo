  @extends('layouts.layout-user')

  @section('title') Inicio @endsection

  @section('CSS')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  @endsection

    @section('content')

    <!-- Carousel -->
<body>
  
    <div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/banner1.png?v=') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/banner2.png?v=') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/banner3.png?v=') }}" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/banner4.png?v=') }}" alt="Fourth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/banner5.png?v=') }}" alt="Fifth slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    {{-- Menú --}}
    
    <header class="menu">
      <div class="category-section">
        <div class="row category-container mt-3 g-0">

          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('filter','filter=2') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/mascotas-perdidas.ico') }}" alt="">
                <p>Mascotas Perdidas</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('zonas-caninas') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/zonas-caninas.ico') }}" alt="">
                <p>Zonas Caninas</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-6 col-md-12 col-sm-12 item">
            <a href="{{ route('filter','filter=3') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/mascotas-encontradas.ico') }}" alt="">
                <p>Mascotas Encontradas</p>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="category-section">
        <div class="row category-container mt-3 g-0">

          <div class="col-lg-6 col-md-12 col-sm-12 item">
            <a href="{{ route('servicios') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/tiendas.ico') }}" alt="">
                <p>Servicios en tu sector</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('veterinaria') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/veterinaria.ico') }}" alt="">
                <p>Veterinaria Municipal</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('farmacia') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/farmacia.ico') }}" alt="">
                <p>Farmacia Municipal</p>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="category-section">
        <div class="row category-container mt-3 g-0">

          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('ordenanza') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/ordenanza.ico') }}" alt="">
                <p>Ordenanza Municipal</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('filter','filter=1') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/adoptar.ico') }}" alt="">
                <p>Adopta una mascota</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-6 col-md-12 col-sm-12 item">
            <a href="{{ route('curso-adiestramiento') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/adiestramiento.ico') }}" alt="">
                <p>Curso de adiestramiento</p>
              </div>
            </a>
          </div>
        </div>
      </div>
        
      <div class="category-section">
        <div class="row category-container mt-3 g-0">

          <div class="col-lg-6 col-md-12 col-sm-12 item">
            <a href="{{ route('operativos-veterinarios') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/operativos.ico') }}" alt="">
                <p>Operativos Veterinarios</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('denuncia') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/denuncia.ico') }}" alt="">
                <p>Denuncia Maltrato</p>
              </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-12 item">
            <a href="{{ route('crematorio') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/crematorio.ico') }}" alt="">
                <p>Crematorio</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </header>
    
</body>
      

    @endsection

    @section('JS')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    @endsection
