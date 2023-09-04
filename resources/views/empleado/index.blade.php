
<div class="row">
    <div class="col-md-12">
        <div  class="card border-secondary mb-3">
            <div class="card-header"style="background-color: #FF771F; color: white;">{{ __('Empleados') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr style="background-color: #FF771F; color: white;">
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Departamento</th>
                                <th>Acciones</th>
                            </tr>
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
                                    <td>
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$dato->id}}"><i class="fas fa-pen-square" style="color: #fafafa;"></i></a>
                                        <div class="modal fade" id="modal{{$dato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar informacion de <strong> {{ $dato->empleadoNombre }} </strong>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('empleado.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
