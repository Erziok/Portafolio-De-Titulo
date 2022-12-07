@extends('layouts.layout-admin')
@section('title') Agregar Horario @endsection
@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/select-schedules.css?v=').time() }}">
@endsection
@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Editar Agenda del Servicio</h1>
        <div class="hline"></div>
    </div>
    <div class="form-box">
        <form action="{{ route('admin.service.update-schedule') }}" method="POST" id="form-update-schedules">
            @csrf
            @method('PUT')
            {{-- Schedules --}}
            <input type="hidden" name="service_id" value="{{ $service['id'] }}">
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
                        <?php
                            $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
                            for ($i = 0; $i < sizeOf($service['schedule']); $i++){
                                if (($key = array_search($service['schedule'][$i]['day'], $days)) !== false) {
                                    unset($days[$key]);
                                }   
                            }
                            for ($i=0; $i < 7 ; $i++) { 
                                if (in_array($i, array_keys($days))) {
                                    displayDefaultServiceSchedule($days[$i]);
                                }else{
                                    displaySelectedServiceSchedule($service['schedule'][$i]);
                                }
                            }
                        ?>
                        @error('day')
                                <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <strong class="mt-2 text-center" style="color: darkred; display:none;" id="schedule-error"><i class="fa-solid fa-circle-exclamation"></i> Tienes que asignarles un horario a los días seleccionados</strong>
                </div>
                <div class="btn-component mt-5">
                    <button class="btn-default" type="submit">Guardar Agenda</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script src="{{ asset('js/select-schedules.js?v='.time()) }}"></script>
    <script src="{{ asset('js/select-hours.js?v='.time()) }}"></script>
    <script src="{{ asset('js/admin-validate-schedule.js?v='.time()) }}"></script>
@endsection



