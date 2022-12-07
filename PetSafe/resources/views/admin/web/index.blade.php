@extends('layouts.layout-admin')

@section('title') Configuración @endsection

@section('content')
<div class="app-body-main-content">

    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Configuraciónes de la Web</h1>
        <div class="hline"></div>
    </div>

    <form action="" method="POST">
        @csrf

        <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="pageName" type="text" name="pageName" placeholder="Nombre de la Página" autocomplete="off" value="{{ Config::get('petsafe-web-config.pageName') }}">
                <label for="pageName">Nombre de la Página</label>
                @error('pageName')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="officialMail" type="email" name="officialMail" placeholder="Correo Oficial" autocomplete="off" value="{{ Config::get('petsafe-web-config.officialMail') }}">
                <label for="officialMail">Correo Oficial</label>
                @error('officialMail')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="complaintsMail" type="email" name="complaintsMail" placeholder="Correo Denuncias" autocomplete="off" value="{{ Config::get('petsafe-web-config.complaintsMail') }}">
                <label for="complaintsMail">Correo Denuncias</label>
                @error('complaintsMail')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="contactNumber" type="text" name="contactNumber" placeholder="Correo Denuncias" autocomplete="off" value="{{ Config::get('petsafe-web-config.contactNumber') }}">
                <label for="contactNumber">Número de contacto</label>
                @error('contactNumber')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="paginatePublicationsBy" type="text" name="paginatePublicationsBy" placeholder="Paginación de Publicaciones" autocomplete="off" value="{{ Config::get('petsafe-web-config.paginatePublicationsBy') }}">
                <label for="paginatePublicationsBy">Paginación de Publicaciones</label>
                @error('paginatePublicationsBy')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-box form-box-text mt-4">
            <div class="input-component">
                <input class="c-text-black" id="paginateServicesBy" type="text" name="paginateServicesBy" placeholder="Paginación de Servicios" autocomplete="off" value="{{ Config::get('petsafe-web-config.paginateServicesBy') }}">
                <label for="paginateServicesBy">Paginación de Servicios</label>
                @error('paginateServicesBy')
                    <small class="mt-2" style="color: darkred">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-box form-box-select mt-4">
            <label class="form-label" for="maintenanceMode">Modo Mantenimiento</label>
            <select class="form-select input-select-component shadow-none" name="maintenanceMode" id="maintenanceMode">
                @if (!empty(Config::get('petsafe-web-config.paginateServicesBy')) && Config::get('petsafe-web-config.paginateServicesBy') == 2)
                    <option value="1">Desactivado</option>
                    <option value="2" selected>Activado</option>
                @else
                    <option value="1" selected>Desactivado</option>
                    <option value="2">Activado</option>
                @endif
            </select>
            @error('maintenanceMode')
                <strong style="color: darkred">{{ $message }}</strong>
            @enderror
        </div>

        <div class="btn-component mt-4 mb-3">
            <button class="btn-default" type="submit">Guardar Configuración</button>
        </div>
    </form>
</div>
@endsection

@section('JS')

@endsection