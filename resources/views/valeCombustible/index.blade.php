@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center"style="background-color: #FF771F; color: white;">{{ __('Vales de Combustible') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: #FF771F; color: white;">
                                    <th>Num</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Departamento</th>
                                    <th>C.C</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody>
                                    @foreach ($vale as $datoSolicitante)
                                        <tr >
                                            <td>{{ $datoSolicitante->valeNumero }}</td>
                                            <td>{{ $datoSolicitante->valeFecha }}</td>
                                            <td>{{ $datoSolicitante->valeSolicitante }}</td>
                                            <td>
                                                @foreach ($departamento as $datoDepartamento)
                                                    @if ($datoSolicitante->valeDepartamento == $datoDepartamento->id)
                                                        {{ $datoDepartamento->departamentoNombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $datoSolicitante->valeCc }}</td>
                                            <td>
                                                @if ($datoSolicitante->valeEstado == 'Pendiente')
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$datoSolicitante->id}}">Pendiente</a>
                                               
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Estado del Vale de: <strong> {{ $datoSolicitante->valeSolicitante}} </strong>
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('valeCombustible.edit')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                @if ($datoSolicitante->valeEstado == 'Aceptado')
                                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAceptado{{$datoSolicitante->id}}">Aceptado</a>
                                                @endif

                                                @if ($datoSolicitante->valeEstado == 'Rechazado')
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalRechazado{{$datoSolicitante->id}}">Rechazado</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Modal Rechazado -->
                                        @if ($datoSolicitante->valeEstado == 'Rechazado')
                                        <div class="modal fade" id="modalRechazado{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal Rechazado para {{$datoSolicitante->valeSolicitante}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        El vale de combustible a sido rechazado {{$datoSolicitante->valeSolicitante}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Modal Aceptado -->
                                        @if ($datoSolicitante->valeEstado == 'Aceptado')
                                        <div class="modal fade" id="modalAceptado{{$datoSolicitante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal Aceptado para {{$datoSolicitante->valeSolicitante}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        El vale de combustible a sido aceptado {{$datoSolicitante->valeSolicitante}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
        @endsection
