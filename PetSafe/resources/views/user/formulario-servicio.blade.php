@extends('layouts.layout-user')

@section('CSS')
<link rel="stylesheet" href="{{ asset('css/formulario-mascota.css?v=').time() }}">
<link rel="stylesheet" href="{{ asset('css/select-schedules.css?v=').time() }}">
@endsection

    @section('content')

<body>
        
    <section>
        <div class="publication-section">
            <div class="section-title mb-4 mt-2">
                <h2 class="text-center">Publicita tu servicio</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('formulario-servicio.create') }}" method="POST" id="form">
                @csrf
                <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Nombre</label>
                        <input type="text" id="petname" class="form-control" placeholder="Nombre" name="name"/>
                        <small class="error-text">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                        @error('name')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Dirección</label>
                        <input type="text" id="address" class="form-control" placeholder="Dirección" name="address"/>
                        <small class="error-text">Ingrese al menos 5 carácteres</small>
                        @error('address')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Número de Teléfono</label>
                        <input type="text" id="phone" class="form-control" placeholder="EJ: +56912345678" name="phone"/>
                        <small class="error-text">Ingrese un número válido</small>
                        @error('phone')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <label class="form-label" for="form3Example1q">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="EJ: ejemplo@gmail.com" name="email"/>
                        <small class="error-text">Ingrese un email válido</small>
                        @error('email')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>                    

                    <div class="col-lg-8 col-md-12 col-sm-12 form-box form-box-textarea">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"></textarea>
                        <small class="error-text">Ingrese al menos 10 carácteres</small>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="form3Example1q">Tipo</label>
                        <select class="form-select" name="type" id="type">
                            <option value="" disabled selected>Seleccione un tipo</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <small class="error-text">Seleccione una opción válida</small>
                        @error('type')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>        

                </div>
                {{-- <button type="submit" class="publication-btn" id="submit-btn">Publicar</button> --}}
            <hr>

            {{-- Schedules --}}

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

                    <div class="select-item">
                        <div class="titulo">
                            Lunes
                        </div>
                        <input id="lunes" type="checkbox" class="select-checkbox" name="day[]" value="lunes">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="lunes-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="lunes-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Martes
                        </div>
                        <input id="martes" type="checkbox" class="select-checkbox" name="day[]" value="martes">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="martes-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="martes-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Miercoles
                        </div>
                        <input id="miercoles" type="checkbox" class="select-checkbox" name="day[]" value="miercoles">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="miercoles-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="miercoles-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Jueves
                        </div>
                        <input id="jueves" type="checkbox" class="select-checkbox" name="day[]" value="jueves">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="jueves-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="jueves-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Viernes
                        </div>
                        <input id="viernes" type="checkbox" class="select-checkbox" name="day[]" value="viernes">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="viernes-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="viernes-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Sábado
                        </div>
                        <input id="sabado" type="checkbox" class="select-checkbox" name="day[]" value="sabado">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="sabado-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="sabado-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <div class="select-item">
                        <div class="titulo">
                            Domingo
                        </div>
                        <input id="domingo" type="checkbox" class="select-checkbox" name="day[]" value="domingo">
                        <div class="pivote">
                            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                        </div>
                        <div class="accion">
                            <p>Hora Inicio</p>
                            <select class="select-hour-start" id="domingo-inicio" name="startHour[]">
                                <option value="" ></option>
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
                            </select>
                            <p>Hora Final</p>
                            <select class="select-hour-end" id="domingo-fin" name="endHour[]">
                                <option value="" ></option>
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
                        </div>
                    </div>
                    <button type="submit" class="publication-btn" id="submit-btn">Publicar</button>    
                </form>              
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