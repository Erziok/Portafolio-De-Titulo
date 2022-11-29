@extends('layouts.layout-admin')
@section('title') Servicios @endsection
@section('CSS')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    @if (Session::has('message'))
        <div class="alert alert-warning alert-dismissible fade show mt-4 mb-1" role="alert">
            <strong>Recuerde</strong>, {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="box-agregar mt-3">
        <a href="{{ route('admin.service.create') }}"><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-servicios" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Descripción</th>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->phone }}</td>
                    <td>{{ $service->email }}</td>
                    <td>{{ Str::limit($service->description, 75) }}</td>
                    <td><div class="img-box"><img src="{{ asset($service->photo) }}"></div></td>
                    <td>{{ $service->Type->type }}</td>
                    {{ displayStatus($service->active) }}
                    @if (count($service->schedule) == 0)
                        <td>
                            <a href="{{ route('admin.service.create-schedules', $service->id) }}" class="btn btn-primary">
                                Añadir Horario
                            </a>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-primary ver-detalles-horario" data-bs-toggle="modal" data-bs-target="#modal-con-horarios" data-service="{{ $service->id }}">
                                Ver Detalles
                            </button>
                            <a href="{{ route('admin.service.edit-schedules', $service->id) }}" class="btn btn-warning text-light"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                    @endif
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href="{{ route('admin.service.edit', $service) }}"><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.service.destroy', $service) }}" method="POST">
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
                <th>Teléfono</th>
                <th>Email</th>
                <th>Descripción</th>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-con-horarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Horarios del Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body-modal-horarios">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('JS')
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('js/schedules-list.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#tabla-servicios').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection