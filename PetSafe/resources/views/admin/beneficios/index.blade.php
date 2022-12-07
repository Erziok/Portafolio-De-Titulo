@extends('layouts.layout-admin')
@section('title') Beneficios @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Beneficios Municipales</h1>
        <div class="hline"></div>
    </div>

    <div class="btn-component">
        <a href="{{ route('admin.benefit.create') }}" class="btn-simple-component">Añadir Nuevo <i class="fa-solid fa-plus"></i></a>
    </div>
    
    <table id="tabla-publicaciones" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($benefits as $benefit)
                <tr>
                    <td>{{ $benefit->id }}</td>
                    <td>{{ $benefit->name }}</td>
                    <td>{{ Str::limit($benefit->description, 75) }}</td>
                    <td>{{ $benefit->type->type }}</td>
                    {{ displayStatus($benefit->active) }}
                    @if ($benefit->user_id == null )
                        <td>No asignado</td>
                    @else
                        <td>{{ $benefit->user->firstname.' '. $benefit->user->lastname}}</td>
                    @endif
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href=" {{ route('admin.benefit.edit', $benefit) }} "><button data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.benefit.destroy', $benefit) }}" method="POST" class="formulario-eliminar">
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
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Usuario</th>
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
            $('#tabla-publicaciones').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection