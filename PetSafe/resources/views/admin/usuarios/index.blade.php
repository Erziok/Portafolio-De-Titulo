@extends('layouts.layout-admin')
@section('title') Usuarios @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="box-agregar mt-3">
        <a href="{{ route('admin.user.create') }}"><button>Añadir Nuevo <i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table id="tabla-usuarios" class="table table-striped" style="width:100%">
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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->run }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->avatar == null)
                        <td><div class="img-box"><img src="{{ url('images/placeholder-user.jpg') }}"></div></td>
                    @else
                        <td><div class="img-box"><img src="{{ asset($user->avatar) }}"></div></td>
                    @endif
                    <td>{{ $user->Role->role }}</td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href="{{ route('admin.user.edit', $user) }}"><button><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
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
            $('#tabla-usuarios').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });

    </script>
@endsection