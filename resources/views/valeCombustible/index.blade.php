@extends('layouts.app')

@section('content')
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="70cf02be0b65b144043f4959-|49" defer=""></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" type="70cf02be0b65b144043f4959-text/javascript"></script>
<script type="70cf02be0b65b144043f4959-text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<style>
    .container {
        /* From https://css.glass */
        background: linear-gradient(to top, rgba(0, 0, 0, 4), rgba(250, 250, 250, 0.59));
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.47);
        font-weight: bold;
        color: white;
    }

    .text-center{
        color: white;
    }
    .modal-dialog{
        color: black;
    }


    /* Estilo para el hover (paso del mouse) */
    .btn:hover {
        background-color: whitesmoke;
        /* Cambia el color de fondo al pasar el mouse */
        color: green;
        /* Cambia el color de texto al pasar el mouse */
    }

    /* Estilo para el estado activo (cuando se selecciona el botón) */
    .btn:active {
        background-color: grey;
        /* Cambia el color de fondo al hacer clic */
    }
</style>

<script type="70cf02be0b65b144043f4959-text/javascript">
    $(document).ready(function() {
        var table = $('#valeTable').DataTable({
            pagingType: 'full_numbers',
            pageLength: 10,
            lengthMenu: [10, 20, 30, 100],
            "language": {
                "search": "Buscar&nbsp;:",
                "lengthMenu": "Mostrar _MENU_ vales",
                "zeroRecords": "Vale No Encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay vales disponibles",
                "infoFiltered": "(filtrado de _MAX_ vales de combustible)",
                "paginate": {
                    "first": "<i class='fa fa-angle-double-left'></i>",
                    "last": "<i class='fa fa-angle-double-right'></i>",
                    "previous": "<i class='fa fa-angle-left'></i>",
                    "next": "<i class='fa fa-angle-right'></i>"
                },

                select: {
                    rows: {
                        _: ""
                    }
                },
            },
            columnDefs: [{
                type: 'date',
                targets: 0
            }],
            order: [
                [0, 'desc']
            ]
        });
    });
</script>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <div>
                    <div>
                        <table id="valeTable" class="table table-striped table-bordered" cellspacing="1" width="100%">
                            <thead style="background-color: #FF771F; color: white;">
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Solicitante</th>
                                <th class="text-center">Departamento</th>
                                <th class="text-center">Área</th>
                                <th class="text-center">C.C</th>
                                <th class="text-center">Estado</th>

                            </thead>
                            <tbody>
                                @foreach ($vale as $datoSolicitante)
                                <tr>
                                    <td class="text-center">{{ $datoSolicitante->valeFecha }}</td>
                                    <td class="text-center">{{ $datoSolicitante->valeSolicitante }}</td>
                                    <td class="text-center">
                                        @foreach ($departamento as $datoDepartamento)
                                        @if ($datoSolicitante->valeDepartamento == $datoDepartamento->id)
                                        {{ $datoDepartamento->departamentoNombre }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $datoSolicitante->valeArea }}</td>
                                    <td class="text-center">{{ $datoSolicitante->valeCc }}</td>
                                    <td class="d-flex justify-content-center">
                                        @if ($datoSolicitante->valeEstado == 'Pendiente')
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$datoSolicitante->id}}"><i class="fas fa-hourglass-half"></i></a>
                                        <!-- como filtrar datos por JSON por fechas -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Estado del Vale</strong></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('valeCombustible.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($datoSolicitante->valeEstado == 'Aceptado')
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAceptado{{$datoSolicitante->id}}"><i class="fas fa-check-circle"></i></a>
                                        @endif

                                        @if ($datoSolicitante->valeEstado == 'Rechazado')
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalRechazado{{$datoSolicitante->id}}"><i class="fas fa-window-close"></i></a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal Rechazado -->
                                @if ($datoSolicitante->valeEstado == 'Rechazado')
                                <div class="modal fade" id="modalRechazado{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><strong>Estado del Vale</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @include('valeCombustible.edit')
                                                <a class="btn btn-danger"> El vale de combustible ha sido rechazado por: {{$datoSolicitante->valeAutorizo}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Modal Aceptado -->
                                @if ($datoSolicitante->valeEstado == 'Aceptado')
                                <div class="modal fade" id="modalAceptado{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title-center" id="exampleModalLabel"><strong>Estado del Vale</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                @include('valeCombustible.edit')
                                                <a class="btn btn-success"> El vale de combustible ha sido aceptado por: {{$datoSolicitante->valeAutorizo}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection