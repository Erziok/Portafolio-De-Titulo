@extends('layouts.layout-admin')
@section('title') Cursos @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="box-agregar mt-3">
        <a href="{{ route('admin.course.create') }}"><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-cursos" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Descripción</th>
                <th>Objetivos</th>
                <th>Materiales</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->phone }}</td>
                    <td>{{ Str::limit($course->description, 75) }}</td>
                    <td>{{ Str::limit($course->objectives, 75) }}</td>
                    <td>{{ $course->materials }}</td>
                    {{ displayStatus($course->active) }}
                    @if (count($course->session) == 0)
                        <td>
                            <a href="{{ route('admin.course.create-sessions', $course->id) }}" class="btn btn-primary">
                                Añadir Agenda
                            </a>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-primary ver-detalles-agenda" data-bs-toggle="modal" data-bs-target="#modal-con-sesiones" data-course="{{ $course->id }}">

                                Ver Detalles

                            </button>
                            <a href="{{ route('admin.course.edit-sessions', $course->id) }}" class="btn btn-warning text-light"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                    @endif
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href="{{ route('admin.course.edit', $course) }}"><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.course.destroy', $course) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Descripción</th>
                <th>Objetivos</th>
                <th>Materiales</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-con-sesiones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sesiones del Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body-modal-sesiones">
                
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
    <script src="{{ asset('js/sessions-list.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#tabla-cursos').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection