@extends('layouts.layout-admin')
@section('title') Publicaciones @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="box-agregar mt-3">
        <a href="{{ route('admin.publication.create') }}"><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-publicaciones" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Incidente</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Foto</th>
                <th>Usuario</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publications as $publication)
                <tr>
                    <td>{{ $publication->id }}</td>
                    <td>{{ $publication->title }}</td>
                    <td>{{ $publication->incidentDate }}</td>
                    <td>{{ Str::limit($publication->description, 75) }}</td>
                    <td>{{ $publication->active }}</td>
                    <td><div class="img-box"><img src="{{ asset($publication->photo) }}"></div></td>
                    <td>{{ $publication->user->firstname.' '. $publication->user->lastname}}</td>
                    <td>{{ $publication->category->category }}</td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href=" {{ route('admin.publication.edit', $publication) }} "><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.publication.destroy', $publication) }}" method="POST">
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
                <th>Ditulo</th>
                <th>Incidente</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Foto</th>
                <th>Usuario</th>
                <th>Categoría</th>
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