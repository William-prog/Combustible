@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Datos de Solicitante') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Num</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Departamento</th>
                                    <th>C.C</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody>
                                    @foreach ($vale as $datoSolicitante)
                                        <tr>
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
                                                    <a class="btn btn-primary" href="{{ url('/valeCombustible/' . $datoSolicitante->id .'/edit') }}">Pendiente</a>
                                                @endif
                                                @if ($datoSolicitante->valeEstado == 'Aceptado')
                                                    <a class="btn btn-success" href="{{ url('/valeCombustible/' . $datoSolicitante->id .'/edit') }}">Aceptado</a>
                                                @endif
                                                @if ($datoSolicitante->valeEstado == 'Rechazado')
                                                    <a class="btn btn-danger" href="{{ url('/valeCombustible/' . $datoSolicitante->id .'/edit') }}">Rechazado</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
