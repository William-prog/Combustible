@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Departamento') }}</div>

                    <div class="card-body">
                        Vista del Departamento
                        <table class="table">
                            <thead>
                                <th>Nombre del departamento</th>
                                <th>Departamento de Centro de Costos</th>
                                <th>Descripcion del departamento</th>
                                <th>Area de departamento</th>
                            </thead>
                            <tbody>
                                @foreach ($departamento as $dato)
                                    <tr>
                                        <td>{{ $dato->departamentoNombre }}</td>
                                        <td>{{ $dato->departamentoCC }}</td>
                                        <td>{{ $dato->departamentoDescripcion }}</td>
                                        <td>{{ $dato->departamentoArea }}</td>
                                        <td>
                                            <a class="button" href="{{ url('/departamento/' . $dato->id . '/edit') }}">Editar</a>
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
