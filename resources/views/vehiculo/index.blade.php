<div class="row">
    <div class="col-md-12">
        <div class="card border-secondary mb-3">
            <div class="card-header" style="background-color: #FF771F; color: white;">{{ __('Vehiculo') }}</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr style="background-color: #FF771F; color: white;">
                                <th>Numero económico</th>
                                <th>Placas</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Año</th>
                                <th>Combustible</th>
                                <th>Acciones</th>
                            </tr>
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
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$dato->vehiculoEco}}"><i class="fas fa-pen-square" style="color: #fafafa;"></i></a>
                                        <div class="modal fade" id="modal{{$dato->vehiculoEco}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar informacion de <strong> {{ $dato->vehiculoModelo }} </strong>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('vehiculo.edit')
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

