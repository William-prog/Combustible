<div class="row">
    <div class="col-md-12 ">
        <div class="card border-secondary mb-3">
            <div class="card-header" style="background-color: #FF771F; color: white;">{{ __('Areas') }}</div>
            <div class="card-body ">

                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr style="background-color: #FF771F; color: white;">
                                <th>Area</th>
                                <th>Departamento del área</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
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
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$dato->areaNombre}}"><i class="fas fa-pen-square"></i></a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{$dato->areaNombre}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar informacion de <strong> {{ $dato->areaNombre }} </strong>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('area.edit')
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
