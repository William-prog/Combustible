@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        Vista Area
                        <table class="table">
                            <thead>
                                <th>Nombre del area</th>
                                <th>Departamento area</th>
                                <th>Descripcion del area</th>
                            </thead>
                            <tbody>
                                @foreach ($area as $dato)
                                    <tr>
                                        <td>{{ $dato->areaNombre }}</td>
                                        <td>
                                            @foreach ($departamento as $datoDepartamento)
                                                @if ($dato->areaDepartamento == $datoDepartamento->id)
                                                    {{ $datoDepartamento->departamentoNombre }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $dato->areaDescripcion }}</td>

                                        <td>
                                            <a class="button" href="{{ url('/area/' . $dato->id . '/edit') }}">Editar</a>

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
