@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Empleados') }}</div>
                    <div class="card-body">
                        Tabla Empleados
                        <table class="table">
                            <thead>
                                <th>Numero de empleado</th>
                                <th>Nombre empleado</th>
                                <th>Puesto empleado</th>
                                <th>Departamento del empleado</th>
                            </thead>
                            <tbody>
                                @foreach ($empleado as $dato)
                                    <tr>
                                        <td>{{ $dato->empleadoNumero }}</td>
                                        <td>{{ $dato->empleadoNombre }}</td>
                                        <td>{{ $dato->empleadoPuesto }}</td>
                                        <td>

                                            @foreach ($departamento as $datoDepartamento)
                                                @if ($dato->empleadoDepartamento == $datoDepartamento->id)
                                                    {{ $datoDepartamento->departamentoNombre }}
                                                @endif
                                            @endforeach
                                            
                                        </td>
                                            <a class="button" href="{{ url('/empleado/' . $dato->id . '/edit') }}">Editar</a>
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
