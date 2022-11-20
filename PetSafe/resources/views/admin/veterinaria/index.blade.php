@extends('layouts.layout-admin')
@section('title') Veterinaria @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="box-agregar mt-3">
        <a href="{{ route('admin.clinicalProcedure.create') }}"><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-veterinaria" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Beneficio</th>
                <th>Email</th>
                <th>Número</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinicalProcedures as $clinicalProcedure)
                <tr>
                    <td>{{ $clinicalProcedure->id }}</td>
                    <td>{{ $clinicalProcedure->name }}</td>
                    <td>{{ Str::limit($clinicalProcedure->description, 75) }}</td>
                    <td>{{ $clinicalProcedure->benefit->name}}</td>
                    <td>{{ $clinicalProcedure->email }}</td>
                    <td>{{ $clinicalProcedure->phone }}</td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href=" {{ route('admin.clinicalProcedure.edit', $clinicalProcedure ) }} "><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.clinicalProcedure.destroy', $clinicalProcedure) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
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
                <th>Descripcion</th>
                <th>Beneficio</th>
                <th>Email</th>
                <th>Número</th>
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
            $('#tabla-veterinaria').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection