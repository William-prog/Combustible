<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="70cf02be0b65b144043f4959-|49" defer=""></script>
<link rel="stylesheet"
        type="text/css"href="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" type="70cf02be0b65b144043f4959-text/javascript"></script>
    <script type="70cf02be0b65b144043f4959-text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.js"></script>

    <script type="70cf02be0b65b144043f4959-text/javascript">
    $(document).ready(function() {
        var table1 = $('#tablaDepartamento').DataTable({
            pagingType: 'full_numbers',
            pageLength: 10,
            lengthMenu: [10, 20, 30, 100],
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ Departamentos",
                "zeroRecords": "Departamento no encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay Departamento disponibles",
                "infoFiltered": "(filtrado de _MAX_ Departamento  en total)",
                "paginate": {
                    "first": "<i class='fa fa-angle-double-left'></i>",
                    "last": "<i class='fa fa-angle-double-right'></i>",
                    "previous": "<i class='fa fa-angle-left'></i>",
                    "next": "<i class='fa fa-angle-right'></i>"
                },
                select: {
                    rows: {
                        _: ""
                    }
                }
            }
        })
    });
</script>


<div class="row">
    <div class="col-md-12">
        <div class="card border-secondary mb-3">
            <div class="card-header"style="background-color: #FF771F; color: white;">{{ __('Departamentos') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tablaDepartamento" class="table table-striped custom-table">
                        <thead>
                            <tr style="background-color: #FF771F; color: white;">
                                <th>Departamento</th>
                                <th>CC</th>
                                <th>Descripción</th>
                                <th>Operación</th>
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
                                        <div class="container1">
                                            <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalD{{ $dato->departamentoCC }}">
                                                <i class="fas fa-pen-square" style="color: #fafafa;"></i>
                                            </a>
                                        </div>
                                        <style>
                                            .container1 {
                                                display: flex;
                                                justify-content: center;
                                                /* Centra horizontalmente */
                                                align-items: center;
                                                /* Centra verticalmente */

                                            }
                                        </style>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalD{{ $dato->departamentoCC }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar
                                                            informacion de <strong> {{ $dato->departamentoNombre }}
                                                            </strong>
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
