@extends('layouts.layout-admin')
@section('title') Editar Sesiones @endsection
@section('content')

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="app-body-main-content">
    <div class="form-box">
        <form action="{{ route('admin.course.update-sessions') }}" method="POST" id="form-store-sessions">
            @method('PUT')
            @csrf
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <h2 class="f-size-lg mb-2">Calendario</h2>
                    <div class="box-calendar">
                        <div class="calendar-header mb-3">
                            <div class="box-prev-month">
                                <button class="btn-calendar-month" onclick="previous()"><i class="fa-solid fa-chevron-left"></i></button>
                            </div>
                            <div class="calendar-title">
                                <h3 class="f-size-md" id="monthAndYear"></h3>
                            </div>
                            <div class="box-next-month">
                                <button class="btn-calendar-month" onclick="next()"><i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <table class="table table-responsive-sm m-0 text-center" id="calendar">
                            <thead>
                                <th>Lun</th>
                                <th>Mar</th>
                                <th>Mier</th>
                                <th>Jue</th>
                                <th>Vie</th>
                                <th>Sáb</th>
                                <th>Dom</th>
                            </thead>
                            <tbody id="calendar-body">
    
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-3">
                            <label for="">Hora Inicio</label>
                            <select class="form-select from-control mt-1" aria-label="Default select example" id="hora-inicio">
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
                            <span class="error-label" id="hora-inicio-error"><b>Campo Requerido</b></span>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-3">
                            <label for="">Hora Final</label>
                            <select class="form-select from-control mt-1" aria-label="Default select example" id="hora-final">
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
                            <span class="error-label" id="hora-fin-error"><b>Campo Requerido</b></span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-success btn-xs form-control text-center" id="btn-agregar">Añadir a la Agenda &raquo;</button>
                    </div>
                </div>
                <div class="container col-lg-6 col-md-6 col-sm-12 mt-5">
                    <h2 class="f-size-lg mb-2">Agenda del curso</h2>
                    <div class="agenda-box" id="agenda-box">
                        <div class="mt-4 mb-4"><b class="text-secondary">Aún no hay nada agendado a este curso.</b></div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-xs form-control" id="guardar-agenda">Guardar Agenda</button>
                        <span class="error-label mt-2" id="agenda-vacia-error"><b>No has añadido ninguna fecha.</b></span>
                    </div>
                </div>
            </div>  
        </form>
    </div>
</div>
@endsection

@section('JS')
    <script src="{{ asset('js/course-calendar-update.js?v='.time()) }}"></script>
    <script>var course_id = {{ $course_id }};</script>
@endsection