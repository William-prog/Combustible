@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Datos de Solicitante') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Fecha</th>
                                    <th>No. Economico</th>
                                    <th>Solicitante</th>
                                    <th>Departamento</th>
                                    <th>Area</th>
                                    <th>C.C</th>
                                </thead>
                                <tbody>
                                    @foreach ($vale as $datoSolicitante)
                                        <tr>
                                            <td>{{ $datoSolicitante->valeFecha }}</td>
                                            <td>{{ $datoSolicitante->valeNumero }}</td>
                                            <td>{{ $datoSolicitante->valeSolicitante }}</td>
                                            <td>{{ $datoSolicitante->valeDepartamento }}</td>
                                            <td>{{ $datoSolicitante->valeArea }}</td>
                                            <td>{{ $datoSolicitante->valeCc }}</td>
                                            <td>
                                                <a class="button" href="{{ url('/ValeCombustible/' . $datoSolicitante->id . '/edit') }}">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Datos del Vehiculo') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>No. Economico</th>
                                    <th>Placas</th>
                                    <th>Combustible</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Kilometraje</th>
                                    <th>Litros</th>
                                    <th>Cantidad en letra</th>
                                </thead>
                                <tbody>
                                    @foreach ($vale as $datoVale)
                                        <tr>
                                            <td>{{ $datoVale->valeEconomico }}</td>
                                            <td>{{ $datoVale->valePlacas }}</td>
                                            <td>{{ $datoVale->valeCombustible }}</td>
                                            <td>{{ $datoVale->valeMarca }}</td>
                                            <td>{{ $datoVale->valeModelo }}</td>
                                            <td>{{ $datoVale->valeAño }}</td>
                                            <td>{{ $datoVale->valeKilometraje }}</td>
                                            <td>{{ $datoVale->valeLitros }}</td>
                                            <td>{{ $datoVale->valeCantidad }}</td>
                                            <td>
                                                <a class="button" href="{{ url('/ValeCombustible/' . $datoVale->id . '/edit') }}">Editar</a>
                                            </td>
                                        </tr>
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

