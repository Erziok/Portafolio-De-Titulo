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
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Solicitudes de Socio</h1>
        <div class="hline"></div>
    </div>
    <table id="tabla-servicios" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción de la solicitud</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1?>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>Solicitud para registrar una cuenta como socio y permitir subir servicios. El servicio seleccionado llamado <b>"{{$solicitud->name}}"</b> es de tipo <b>{{$solicitud->type->type}}.</b></td>
                    <td>
                        <button class="ver-detalles-solicitud btn-simple-component" data-bs-toggle="modal" data-bs-target="#modal-detalle-solicitud" data-service="{{ $solicitud->id }}">Ver detalle <i class="fa-solid fa-circle-info"></i></button>
                    </td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-aprobar">
                                <a href="{{ route('admin.association.approve', ['service'=>$solicitud,'user'=>$solicitud->user]) }}"><button  data-bs-toggle="tooltip" data-bs-placement="top" title="Aprobar"><i class="fa-solid fa-file-circle-check"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <a href="{{ route('admin.association.deny', $solicitud) }}"><button  data-bs-toggle="tooltip" data-bs-placement="top" title="Rechazar"><i class="fa-solid fa-file-circle-xmark"></i></button></a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Descripción de la solicitud</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-detalle-solicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de la solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body-modal-solicitud">
                
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
    <script src="{{ asset('js/partner-request-detail.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#tabla-servicios').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection