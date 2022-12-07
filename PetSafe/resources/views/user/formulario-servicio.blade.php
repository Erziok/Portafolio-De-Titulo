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
                <h2 class="">Publicita tu servicio</h2>
                <div class="hline"></div>
            </div>
            <form action="{{ route('formulario-servicio.create') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <div class="input-component">
                            <input class="c-text-black" id="petname" type="text" name="name" placeholder="Nombre" autocomplete="off">
                            <label for="petname">Nombre</label>
                            <small class="error-text mt-2">Ingrese un nombre correcto (mínimo 3 carácteres / solo letras)</small>
                            @error('name')
                                <small class="mt-2" style="color: darkred">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 form-box form-box-text">
                        <div class="input-component">
                            <input class="c-text-black" id="address" type="text" name="address" placeholder="Dirección" autocomplete="off">
                            <label for="address">Dirección</label>
                            <small class="error-text mt-2">Ingrese al menos 5 carácteres</small>
                            @error('address')
                                <small class="mt-2" style="color: darkred">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <div class="input-component">
                            <input class="c-text-black" id="phone" type="text" name="phone" placeholder="Número de Teléfono" autocomplete="off">
                            <label for="phone">Número de Teléfono</label>
                            <small class="error-text mt-2">Ingrese un número válido</small>
                            @error('phone')
                                <small class="mt-2" style="color: darkred">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text">
                        <div class="input-component">
                            <input class="c-text-black" id="email" type="email" name="email" placeholder="Email" autocomplete="off">
                            <label for="email">Email</label>
                            <small class="error-text mt-2">Ingrese un email válido</small>
                            @error('email')
                                <small class="mt-2" style="color: darkred">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>                    

                    <div class="col-lg-8 col-md-12 col-sm-12 form-box form-box-textarea">
                        <label class="form-label" for="form3Example1q">Descripción</label>
                        <textarea type="textarea" id="description" 
                        class="form-control descripcion input-text-area-component shadow-none" placeholder="Ingrese aquí los detalles de su publicación" 
                        name="description" rows="5"></textarea>
                        <small class="error-text">Ingrese al menos 10 carácteres</small>
                        @error('description')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-box form-box-select">
                        <label class="form-label" for="service_type_id">Tipo de servicio</label>
                        <select class="form-select input-select-component shadow-none" name="service_type_id" id="service_type_id">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <small class="error-text mt-2">Seleccione una opción válida</small>
                        @error('service_type_id')
                            <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>        

                    <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-file">
                        <label class="form-label" for="form3Example1q">Ingrese una fotografía</label><br>
                        <input type="file" id="photo" class="form-control input-file-component shadow-none" 
                        placeholder="" name="photo"/>
                        <small class="error-text">Ingrese un archivo válido</small>
                        @error('photo')
                          <strong style="color: darkred">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>

                {{-- Schedules --}}

                <div class="select-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 horario-section">
                            <h3 class="c-text-black">Horario estandar</h3>
                            <div class="hline mb-3"></div>
                            <div class="horario-estandar">
                                {{-- <p>Hora Inicio</p> --}}
                                <div class="">
                                    <label class="form-label" for="hora-inicio">Hora Inicio</label><br>
                                    <select class="hora-estandar input-select-component shadow-none" id="hora-inicio" name="hora-inicio">
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
                                    </select>
                                </div>
                                <div class="">
                                    {{-- <p>Hora Final</p> --}}
                                    <label class="form-label" for="hora-fin">Hora Final</label><br>
                                    <select class="hora-estandar input-select-component shadow-none" id="hora-fin" name="hora-fin">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 horario-section mt-4">
                            <h3 class="">Días laborales</h3>
                            <div class="hline mb-3"></div>
                            <div class="select-item">
                                <div class="titulo">
                                    Lunes
                                </div>
                                <input id="lunes" type="checkbox" class="select-checkbox" name="day[]" value="Lunes">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="lunes-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="lunes-fin" name="endHour[]">
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
                                <input id="martes" type="checkbox" class="select-checkbox" name="day[]" value="Martes">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="martes-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="martes-fin" name="endHour[]">
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
                                <input id="miercoles" type="checkbox" class="select-checkbox" name="day[]" value="Miercoles">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="miercoles-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="miercoles-fin" name="endHour[]">
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
                                <input id="jueves" type="checkbox" class="select-checkbox" name="day[]" value="Jueves">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="jueves-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="jueves-fin" name="endHour[]">
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
                                <input id="viernes" type="checkbox" class="select-checkbox" name="day[]" value="Viernes">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="viernes-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="viernes-fin" name="endHour[]">
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
                                <input id="sabado" type="checkbox" class="select-checkbox" name="day[]" value="Sabado">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="sabado-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="sabado-fin" name="endHour[]">
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
                                <input id="domingo" type="checkbox" class="select-checkbox" name="day[]" value="Domingo">
                                <div class="pivote">
                                    <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                <div class="accion">
                                    <p>Hora Inicio</p>
                                    <select class="select-schedule-hour select-hour-start input-select-component shadow-none" id="domingo-inicio" name="startHour[]">
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
                                    <select class="select-schedule-hour select-hour-end input-select-component shadow-none" id="domingo-fin" name="endHour[]">
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
                        </div>
                        <strong class="mt-2 text-center" style="color: darkred; display:none;" id="schedule-error"><i class="fa-solid fa-circle-exclamation"></i> Tienes que asignarles un horario a los días seleccionados</strong>

                        <div class="btn-component mt-5">
                            <button class="btn-default" type="submit">Publicar Servicio</button>
                        </div>
                    </div>              
                </div>          
            </form>
        </div>
    </section>

    @endsection

@section('JS')
<script src="{{ asset('js/validate-service.js') }}"></script>
<script src="{{ asset('js/select-schedules.js') }}"></script>
<script src="{{ asset('js/select-hours.js') }}"></script>
@endsection
</body>