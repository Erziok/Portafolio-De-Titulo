@extends('layouts.layout-admin')
@section('title') Zonas Caninas @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Zonas Caninas</h1>
        <div class="hline"></div>
    </div>
    <div class="btn-component">
        <a href="{{ route('admin.canineArea.create') }}" class="btn-simple-component">Añadir Nuevo <i class="fa-solid fa-plus"></i></a>
    </div>
    <table id="tabla-zonas" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Comentario</th>
                <th>Enlace</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($canineAreas as $canineArea)
            <tr>
                <td>{{ $canineArea->id }}</td>
                <td>{{ $canineArea->title }}</td>
                <td>{{ Str::limit($canineArea->comment, 75) }}</td>
                <td><a href="{{ $canineArea->url }}" target="_blank"> Ver Mapa <i class="fa-solid fa-location-dot"></i></a></td>
                <td><div class="img-box"><img src="{{ asset($canineArea->photo) }}"></div></td>
                {{ displayStatus($canineArea->active) }}
                <td>
                    <div class="acciones-box">
                        <div class="box-editar">
                            <a href=" {{ route('admin.canineArea.edit', $canineArea) }} "><button data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pencil"></i></button></a>
                        </div>
                        <div class="box-eliminar">
                            <form action="{{ route('admin.canineArea.destroy', $canineArea) }}" method="POST" id="formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Comentario</th>
                <th>Enlace</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('JS')
<!--DataTables-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tabla-zonas').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection