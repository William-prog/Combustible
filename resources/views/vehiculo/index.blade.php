@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('vehiculo') }}</div>
                    <div class="card-body">
                        Tabla Vehiculo
                        <table class="table">
                            <thead>
                                <th>Numero economico:</th>
                                <th>Placas del vehiculo:</th>
                                <th>Modelo del vehiculo:</th>
                                <th>Marca del vehiculo:</th>
                                <th>Año del vehiculo:</th>
                                <th>Combustible:</th>
                            </thead>
                            <tbody>
                                @foreach ($vehiculo as $dato)
                                    <tr>
                                        <td>{{ $dato->vehiculoEco }}</td>
                                        <td>{{ $dato->vehiculoPlacas }}</td>
                                        <td>{{ $dato->vehiculoModelo }}</td>
                                        <td>{{ $dato->vehiculoMarca }}</td>
                                        <td>{{ $dato->vehiculoAño }}</td>
                                        <td>{{ $dato->vehiculoCombustible }}</td>
                                            
                                        <td>
                                            <a class="button" href="{{ url('/vehiculo/' . $dato->id . '/edit') }}">Editar</a>
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
@endsection
