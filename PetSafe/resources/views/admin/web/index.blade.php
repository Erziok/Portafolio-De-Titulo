@extends('layouts.layout-admin')

@section('title') Configuración @endsection

@section('content')
<div class="app-body-main-content">
    <div class="header-publication">
        <div class="section-title mb-5 mt-2">    
            <h1 class="f-size-lg">Configuraciónes de la Web</h1>
            <div class="hline"></div>
        </div>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Nombre de la Página</label>
            <input type="text" name="pageName" class="form-control" value="{{ Config::get('petsafe-web-config.pageName'); }}">
            @error('pageName')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Correo Oficial</label>
            <input type="text" name="officialMail" class="form-control" value="{{ Config::get('petsafe-web-config.officialMail'); }}">
            @error('officialMail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Correo Denuncias</label>
            <input type="text" name="complaintsMail" class="form-control" value="{{ Config::get('petsafe-web-config.complaintsMail'); }}">
            @error('complaintsMail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Número de contacto</label>
            <input type="text" name="contactNumber" class="form-control" value="{{ Config::get('petsafe-web-config.contactNumber'); }}">
            @error('contactNumber')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Paginación de Publicaciones</label>
            <input type="text" name="paginatePublicationsBy" class="form-control" value="{{ Config::get('petsafe-web-config.paginatePublicationsBy'); }}">
            @error('paginatePublicationsBy')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Paginación de Servicios</label>
            <input type="text" name="paginateServicesBy" class="form-control" value="{{ Config::get('petsafe-web-config.paginateServicesBy'); }}">
            @error('paginateServicesBy')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Modo Mantenimiento</label>
            <select name="maintenanceMode" class="form-control" id="">
                @if (!empty(Config::get('petsafe-web-config.paginateServicesBy')) && Config::get('petsafe-web-config.paginateServicesBy') == 2)
                    <option value="1">Desactivado</option>
                    <option value="2" selected>Activado</option>
                @else
                    <option value="1" selected>Desactivado</option>
                    <option value="2">Activado</option>
                @endif
            </select>
            @error('maintenanceMode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary">Guardar Configuración</button>
    </form>
</div>
@endsection

@section('JS')

@endsection