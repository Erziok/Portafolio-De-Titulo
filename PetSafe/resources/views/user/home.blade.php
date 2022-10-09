  @extends('layouts.layout-user')

    @section('content')

    <!-- Carousel -->

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
            <a href="{{ route('perdidas') }}">
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
            <a href="{{ route('encontradas') }}">
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
            <a href="{{ route('tiendas') }}">
              <div class="category-box text-center">
                <img src="{{ asset('images/tiendas.ico') }}" alt="">
                <p>Tiendas en tu sector</p>
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
            <a href="{{ route('adopcion') }}">
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
      

    @endsection
