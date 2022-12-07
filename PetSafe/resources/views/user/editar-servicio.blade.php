@extends('layouts.layout-user')

@section('title') Formulario Servicio @endsection

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
<link rel="stylesheet" href="{{ asset('css/select-schedules.css?v=').time() }}">
@endsection

@section('content')

<body>
    <section>
        <div class="publication-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Actualiza tu servicio</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('formulario-servicio.update', ['service'=>$service]) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="petname" class="form-control" placeholder="Nombre" name="name" value="{{ $service->name }}"/>
                        <small class="error-text">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Dirección</label>
                        <input type="text" id="address" class="form-control" placeholder="Dirección" name="address" value="{{ $service->address }}"/>
                        <small class="error-text">Ingrese al menos 5 carácteres</small>
                        @error('address')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Número de Teléfono</label>
                        <input type="text" id="phone" class="form-control" placeholder="EJ: +56912345678" name="phone" value="{{ $service->phone }}"/>
                        <small class="error-text">Ingrese un número válido</small>
                        @error('phone')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="EJ: ejemplo@gmail.com" name="email" value="{{ $service->email }}"/>
                        <small class="error-text">Ingrese un email válido</small>
                        @error('email')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>                    

                    <div class="col-lg-8 col-md-12 col-sm-12 form-box form-box-textarea">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"> {{ $service->description }} </textarea>
                        <small class="error-text">Ingrese al menos 10 carácteres</small>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Tipo</label>
                        <select class="form-select type" name="service_type_id" id="type_id">
                            <option value="" disabled selected>Seleccione un tipo</option>
                            @foreach ($types as $type)
                                @if ($type->id == $service->service_type_id)
                                    <option value="{{ $type->id }}" selected>{{ $type->type }}</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endif
                                {{-- <option value="{{ $type->id }}">{{ $type->type }}</option> --}}
                            @endforeach
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('service_type_id')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>        

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-file">
                        <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                        <input type="file" id="photo" class="form-control" 
                        placeholder="" name="photo"/>
                        <small class="error-text">Ingrese un archivo válido</small>
                        @error('photo')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
                {{-- <button type="submit" class="publication-btn" id="submit-btn">Publicar</button> --}}
            <hr>

            {{-- Schedules --}}

            <div class="select-container">
                {{-- <input type="hidden" name="service_id" value="{{ $service['id'] }}"> --}}
                <div class="select-container">
                    <h3 class="text-center">Seleccione un horario estandar:</h3>
                    <div class="horario-estandar text-center">
                        {{-- <p>Hora Inicio</p> --}}
                        <label class="form-label" for="form3Example1q">Hora Inicio</label>
                        <select class="hora-estandar" id="hora-inicio" name="hora-inicio">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="7:00">7:00</option>
                            <option value="7:30">7:30</option>
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                        </select><br>
                        @error('startHour')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @error('endHour')
                                <small class="text-danger">{{ $message }}</small>
                        @enderror
                        {{-- <p>Hora Final</p> --}}
                        <label class="form-label" for="form3Example1q">Hora Final</label>
                        <select class="hora-estandar" id="hora-fin" name="hora-fin">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                        </select>
                    </div><br>
                    
                    <h3 class="text-center">Seleccione sus dias laborales:</h3>
                        <?php
                            $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
                            for ($i = 0; $i < sizeOf($schedules); $i++){
                                if (($key = array_search($schedules[$i]['day'], $days)) !== false) {
                                    unset($days[$key]);
                                }   
                            }
                            for ($i=0; $i < 7 ; $i++) { 
                                if (in_array($i, array_keys($days))) {
                                    displayDefaultServiceSchedule($days[$i]);
                                }else{
                                    displaySelectedServiceSchedule($schedules[$i]);
                                }
                            }
                        ?>
                        @error('day')
                                <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="form-group mt-3">
                            <input type="submit" class="form-control btn btn-primary">
                        </div>

                        </form>
                    </div>
                </div>
            </div>          
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/validate-service.js') }}"></script>
<script src="{{ asset('js/select-schedules.js') }}"></script>
<script src="{{ asset('js/select-hours.js') }}"></script>
@endsection
</body>