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
    <div class="box-agregar mt-3">
        <a href=""><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-zonas" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Run</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>2011-04-25</td>
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
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Run</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Rol</th>
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