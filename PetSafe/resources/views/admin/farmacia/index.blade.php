@extends('layouts.layout-admin')

@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="box-agregar mt-3">
        <a href=""><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-farmacia" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Principio Activo</th>
                <th>Función</th>
                <th>Aplicación</th>
                <th>Laboratorio</th>
                <th>Valor con descuento</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->name }}</td>
                    <td>{{ $medicamento->activeSubstance }}</td>
                    <td>{{ $medicamento->function }}</td>
                    <td>{{ $medicamento->implementation }}</td>
                    <td>{{ $medicamento->laboratory }}</td>
                    <td>{{ $medicamento->specie }}</td>
                    <td>{{ $medicamento->price }}</td>
                    <td>{{ $medicamento->discount }}</td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href=""><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <a href=""><button><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Principio Activo</th>
                <th>Función</th>
                <th>Aplicación</th>
                <th>Laboratorio</th>
                <th>Valor con descuento</th>
                <th>Descuento</th>
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
            $('#tabla-farmacia').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection