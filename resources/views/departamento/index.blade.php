<div class="row">
    <div class="col-md-12">
        <div  class="card border-secondary mb-3">
            <div class="card-header"style="background-color: #FF771F; color: white;">{{ __('Departamentos') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                                <thead>
                                    <tr style="background-color: #FF771F; color: white;">
                                    <th>Departamento</th>
                                    <th>Centro de Costos</th>
                                    <th>Descripcion</th>
                                    <th>Area de departamento</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departamento as $dato)
                                        <tr>
                                            <td>{{ $dato->departamentoNombre }}</td>
                                            <td>{{ $dato->departamentoCC }}</td>
                                            <td>{{ $dato->departamentoDescripcion }}</td>
                                            <td>{{ $dato->departamentoArea }}</td>
                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$dato->departamentoCC}}"><i class="fas fa-pen-square" style="color: #fafafa;"></i></a>
                                            <!-- Modal -->
                                        <div class="modal fade" id="modal{{$dato->departamentoCC}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar informacion de <strong> {{ $dato->departamentoNombre }} </strong>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('departamento.edit')
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

