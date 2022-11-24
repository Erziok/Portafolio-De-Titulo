@extends('layouts.layout-admin')
@section('title') Crear Servicio @endsection
@section('CSS')
<link rel="stylesheet" href="{{ asset('css/select-schedules.css?v=').time() }}">
@endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.service.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="">Nombre</label>
                <input type="text" name="name" id="" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Dirección</label>
                <input type="text" name="address" id="" class="form-control">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="" class="form-control">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="">Tipo de Servicio</label>
                <select name="type_id" id="" class="form-control type_id" aria-label="Default select example">
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}"> {{ $type->type }} </option>
                    @empty
                        <option selected disabled>No hay tipos disponibles.</option>
                    @endforelse
                </select>
                @error('type_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <hr>

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

            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script>
        $(document).ready(function() {
        $('.type_id').select2();
        });
    </script>
<script src="{{ asset('js/select-schedules.js') }}"></script>
<script src="{{ asset('js/select-hours.js') }}"></script>
@endsection