<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="70cf02be0b65b144043f4959-|49" defer=""></script>
<link rel="stylesheet"
        type="text/css"href="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" type="70cf02be0b65b144043f4959-text/javascript"></script>
    <script type="70cf02be0b65b144043f4959-text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/sc-1.4.3/sl-1.2.4/datatables.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card border-secondary mb-3">
            <div class="card-header" style="background-color: #FF771F; color: white;">{{ __('Vehiculo') }}</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="tablaVehiculo" class="table table-striped custom-table">
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
                                        <div class="container1">
                                            <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal{{ $dato->id}}"><i
                                                    class="fas fa-pen-square" style="color: #fafafa;"></i></a>
                                        </div>
            
                                        <div class="modal fade" id="modal{{ $dato->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar
                                                            informacion de <strong> {{ $dato->vehiculoModelo }}
                                                            </strong>
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
                            <script>
                                $(document).ready(function() {
                                    $('[data-bs-toggle="modal"]').click(function() {
                                        var target = $(this).data('bs-target');
                                        $(target).modal('show');
                                    });
                                });
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="70cf02be0b65b144043f4959-text/javascript">
    $(document).ready(function() {
        var table1 = $('#tablaVehiculo').DataTable({
            pagingType: 'full_numbers',
            pageLength: 10,
            lengthMenu: [10, 20, 30, 100],
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ Vehiculos",
                "zeroRecords": "Vehiculo no encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay vehiculo disponibles",
                "infoFiltered": "(filtrado de _MAX_ Vehiculo  en total)",
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
<style>
    .container1 {
        display: flex;
        justify-content: center;
        /* Centra horizontalmente */
        align-items: center;
        /* Centra verticalmente */

    }
</style>